<?php
namespace MVP\Auth\Controllers;
use Config\Email;
use MVP\Core\Controllers\Core;
use Myth\Auth\Entities\User;

class Site extends Core
{
    public $auth;
    public $config;
    public function __construct()
    {
        parent::__construct();
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }
    public function login()
    {
        if ($this->auth->check())
        {
            $redirectURL = session('redirect_url') ?? site_url();
            unset($_SESSION['redirect_url']);
            return redirect()->to($redirectURL)->with('message', message(__('Авторизованным пользователям запрещено заново авторизоваться.'),2));
        }
        $this->data['title'] = __('Вход');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url(),
                'text' => __('Главная')
            ],
            [
                'type' => 's',
                'text' => __('Вход')
            ],
        ]);
        $_SESSION['redirect_url'] = session('redirect_url') ?? previous_url() ?? site_url();
        $this->data['config'] = $this->config;
        $this->data['content'] = $this->tmpl->view('ModAuth/site/auth/login', $this->data, true);
        return $this->tmpl->view('ModAuth/site/auth/main', $this->data);
    }
    public function attemptLogin()
    {
        $rules = [
            'login'	=> [
                'rules'  => 'required',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Емаил')])
                ]
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Пароль')])
                ]
            ],
        ];
        if ($this->config->validFields == ['email'])
        {
            $rules['login'] .= '|valid_email';
        }

        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = (bool)$this->request->getPost('remember');

        // Determine credential type
        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Try to log them in...
        if (! $this->auth->attempt([$type => $login, 'password' => $password], $remember))
        {
            return redirect()->back()->withInput()->with('message', message($this->auth->error() ?? lang('Auth.badAttempt'),3));
        }

        // Is the user being forced to reset their password?
        if ($this->auth->user()->force_pass_reset === true)
        {
            return redirect()->to(route_to('reset-password') .'?token='. $this->auth->user()->reset_hash);
        }
        $in_groups = in_groups('admin');
        if($in_groups === true){
            return redirect()->to('admin')->with('message', message(__('Вы успешно авторизовались.')));
        }
        else{
            return redirect()->to('cabinet')->with('message', message(__('Вы успешно авторизовались.')));
        }
    }
    public function logout()
    {
        if ($this->auth->check())
        {
            $this->auth->logout();
        }
        return redirect()->to(site_url())->with('message', message(__('Вы вышли с системы.')));
    }
    public function register()
    {
        // check if already logged in.
        if ($this->auth->check())
        {
            return redirect()->back();
        }

        // Check if registration is allowed
        if (! $this->config->allowRegistration)
        {
            return redirect()->back()->withInput()->with('message', message(lang('Auth.registerDisabled'),3));
        }
        $this->data['title'] = __('Регистрация');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url(),
                'text' => __('Главная')
            ],
            [
                'type' => 's',
                'text' => __('Регистрация')
            ],
        ]);
        $this->data['config'] = $this->config;

        $this->data['content'] = $this->tmpl->view('ModAuth/site/auth/register', $this->data, true);
        return $this->tmpl->view('ModAuth/site/auth/main', $this->data);
    }

    /**
     * Attempt to register a new user.
     */
    public function attemptRegister()
    {
        // Check if registration is allowed
        if (! $this->config->allowRegistration)
        {
            return redirect()->back()->withInput()->with('message', message(lang('Auth.registerDisabled'),3));
        }

        $users = model('UserModel');

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = [
            'username'	=> [
                'rules'  => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Логин')]),
                    'alpha_numeric_space' => __('Поле <b>[input]</b> может содержать только латинские буквы и цифры.',[__('Логин')]),
                    'min_length' => __('Поле <b>[input]</b> должно содержать не менее <b>[num]</b> символов.',[__('Логин'),3]),
                    'is_unique' => __('Поле <b>[input]</b> должно содержать уникальное значение.',[__('Логин'),3])
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Эмаил')]),
                    'valid_email' => __('Поле <b>[input]</b> должно содержать действительный адрес электронной почты.',[__('Эмаил')]),
                    'is_unique' => __('Поле <b>[input]</b> должно содержать уникальное значение.',[__('Эмаил'),3]),

                ]
            ],
            'password' => [
                'rules'  => 'required|strong_password',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Пароль')]),
                ]
            ],
            'pass_confirm' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Повторный пароль')]),
                    'matches' => __('Поле <b>[input]</b> не соответствует полю пароля.',[__('Повторный пароль')]),
                ]
            ]
        ];

        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // Save the user
        $user = new User($this->request->getPost());

        $this->config->requireActivation !== false ? $user->generateActivateHash() : $user->activate();

        // Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (! $users->save($user))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== false)
        {
            $email = service('email');
            $config = new Email();

            $html = $this->tmpl->view('ModAuth/site/auth/emails/activation', ['hash' => $user->activate_hash], true);

            $sent = $email->setFrom($config->fromEmail, $config->fromEmail)
                ->setTo($user->email)
                ->setSubject(lang('Auth.activationSubject'))
                ->setMessage($html)
                ->setMailType('html')
                ->send();

            if (! $sent)
            {
                return redirect()->back()->withInput()->with('error', lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->route('login')->with('message', message(lang('Auth.activationSuccess')));
        }

        // Success!
        return redirect()->route('login')->with('message', message(lang('Auth.registerSuccess')));
    }

    //--------------------------------------------------------------------
    // Forgot Password
    //--------------------------------------------------------------------

    /**
     * Displays the forgot password form.
     */
    public function forgotPassword()
    {
        $this->data['title'] = __('Востановить пароль');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url(),
                'text' => __('Главная')
            ],
            [
                'type' => 's',
                'text' => __('Востановить пароль')
            ],
        ]);
        $this->data['config'] = $this->config;
        $this->data['content'] = $this->tmpl->view('ModAuth/site/auth/forgot', $this->data, true);
        return $this->tmpl->view('ModAuth/site/auth/main', $this->data);
    }

    /**
     * Attempts to find a user account with that password
     * and send password reset instructions to them.
     */
    public function attemptForgot()
    {
        $users = model('UserModel');

        $user = $users->where('email', $this->request->getPost('email'))->first();

        $rules = [
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Емаил')]),
                    'valid_email' => __('Поле <b>[input]</b> должно содержать действительный адрес электронной почты.',[__('Емаил')]),
                ]
            ],
        ];

        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }
        if (is_null($user))
        {
            return redirect()->back()->with('message', message(lang('Auth.forgotNoUser'),3));
        }

        // Save the reset hash /
        $user->generateResetHash();
        $users->save($user);

        $email = service('email');
        $config = config(Email::class);
        $html = $this->tmpl->view('ModAuth/site/auth/emails/forgot', ['hash' => $user->reset_hash], true);
        $sent = $email->setFrom($config->fromEmail, $config->fromEmail)
            ->setTo($user->email)
            ->setSubject(lang('Auth.forgotSubject'))
            ->setMessage($html)
            ->setMailType('html')
            ->send();

        if (! $sent)
        {
            log_message('error', "Failed to send forgotten password email to: {$user->email}");
            return redirect()->back()->withInput()->with('error', lang('Auth.unknownError'));
        }

        return redirect()->route('reset-password')->with('message', message(lang('Auth.forgotEmailSent')));
    }

    /**
     * Displays the Reset Password form.
     */
    public function resetPassword()
    {
        $token = $this->request->getGet('token');

        $this->data['title'] = __('Востановить пароль');
        $this->data['breadcrumb'] = breadcrumb([
            [
                'type' => 'l',
                'link' => site_url(),
                'text' => __('Главная')
            ],
            [
                'type' => 's',
                'text' => __('Востановить пароль')
            ],
        ]);
        $this->data['config'] = $this->config;
        $this->data['token'] = $token;
        $this->data['content'] = $this->tmpl->view('ModAuth/site/auth/reset', $this->data, true);
        return $this->tmpl->view('ModAuth/site/auth/main', $this->data);
    }

    /**
     * Verifies the code with the email and saves the new password,
     * if they all pass validation.
     *
     * @return mixed
     */
    public function attemptReset()
    {
        $users = model('UserModel');

        // First things first - log the reset attempt.
        $users->logResetAttempt(
            $this->request->getPost('email'),
            $this->request->getPost('token'),
            $this->request->getIPAddress(),
            (string)$this->request->getUserAgent()
        );

        $rules = [
            'token'	=> [
                'rules'  => 'required',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Токен')]),
                ]
            ],
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Емаил')]),
                    'valid_email' => __('Поле <b>[input]</b> должно содержать действительный адрес электронной почты.',[__('Емаил')]),
                ]
            ],
            'password' => [
                'rules'  => 'required|strong_password',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Пароль')]),
                ]
            ],
            'pass_confirm' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => __('Поле <b>[input]</b> обязательно для заполнения.',[__('Повторный пароль')]),
                    'matches' => __('Поле <b>[input]</b> не соответствует полю пароля.',[__('Повторный пароль')]),
                ]
            ]
        ];

        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        $user = $users->where('email', $this->request->getPost('email'))
            ->where('reset_hash', $this->request->getPost('token'))
            ->first();

        if (is_null($user))
        {
            return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
        }

        // Reset token still valid?
        if (! empty($user->reset_expires) && time() > $user->reset_expires->getTimestamp())
        {
            return redirect()->back()->withInput()->with('error', lang('Auth.resetTokenExpired'));
        }

        // Success! Save the new password, and cleanup the reset hash.
        $user->password 		= $this->request->getPost('password');
        $user->reset_hash 		= null;
        $user->reset_at 		= date('Y-m-d H:i:s');
        $user->reset_expires    = null;
        $user->force_pass_reset = false;
        $users->save($user);

        return redirect()->route('login')->with('message', message(lang('Auth.resetSuccess')));
    }

    /**
     * Activate account.
     *
     * @return mixed
     */
    public function activateAccount()
    {
        $users = model('UserModel');

        // First things first - log the activation attempt.
        $users->logActivationAttempt(
            $this->request->getGet('token'),
            $this->request->getIPAddress(),
            (string) $this->request->getUserAgent()
        );

        $throttler = service('throttler');

        if ($throttler->check($this->request->getIPAddress(), 2, MINUTE) === false)
        {
            return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests', [$throttler->getTokentime()]));
        }

        $user = $users->where('activate_hash', $this->request->getGet('token'))
            ->where('active', 0)
            ->first();

        if (is_null($user))
        {
            return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
        }

        $user->activate();

        $users->save($user);

        return redirect()->route('login')->with('message', message(lang('Auth.registerSuccess')));
    }

    /**
     * Resend activation account.
     *
     * @return mixed
     */
    public function resendActivateAccount()
    {
        if ($this->config->requireActivation === false)
        {
            return redirect()->route('login');
        }

        $throttler = service('throttler');

        if ($throttler->check($this->request->getIPAddress(), 2, MINUTE) === false)
        {
            return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests', [$throttler->getTokentime()]));
        }

        $login = urldecode($this->request->getGet('login'));
        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $users = model('UserModel');

        $user = $users->where($type, $login)
            ->where('active', 0)
            ->first();

        if (is_null($user))
        {
            return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
        }

        $activator = service('activator');
        $sent = $activator->send($user);

        if (! $sent)
        {
            return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
        }

        // Success!
        return redirect()->route('login')->with('message', message(lang('Auth.activationSuccess')));

    }
}
