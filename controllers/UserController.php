<?php
class UserController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Formulardaten bereinigen
            $data = [
                'username' => trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)),
                'email' => trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'errors' => []
            ];

            // Validierung
            if (empty($data['username'])) {
                $data['errors']['username'] = 'Bitte geben Sie einen Benutzernamen ein.';
            } elseif ($this->userModel->findUserByUsername($data['username'])) {
                $data['errors']['username'] = 'Dieser Benutzername ist bereits vergeben.';
            }

            if (empty($data['email'])) {
                $data['errors']['email'] = 'Bitte geben Sie eine E-Mail-Adresse ein.';
            } elseif ($this->userModel->findUserByEmail($data['email'])) {
                $data['errors']['email'] = 'Diese E-Mail-Adresse ist bereits registriert.';
            }

            if (empty($data['password'])) {
                $data['errors']['password'] = 'Bitte geben Sie ein Passwort ein.';
            } elseif (strlen($data['password']) < 6) {
                $data['errors']['password'] = 'Das Passwort muss mindestens 6 Zeichen lang sein.';
            }

            if ($data['password'] !== $data['confirm_password']) {
                $data['errors']['confirm_password'] = 'Die Passwörter stimmen nicht überein.';
            }

            // Wenn keine Fehler aufgetreten sind, Benutzer registrieren
            if (empty($data['errors'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    $_SESSION['success_message'] = 'Sie wurden erfolgreich registriert!';
                    header('Location: ' . BASE_URL . '/user/login');
                    exit;
                } else {
                    die('Etwas ist schiefgelaufen.');
                }
            }
        } else {
            // GET-Anfrage - leeres Formular anzeigen
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'errors' => []
            ];
        }

        $this->view('user/register', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)),
                'password' => trim($_POST['password']),
                'errors' => []
            ];

            // Benutzer überprüfen
            $user = $this->userModel->findUserByEmail($data['email']);

            if ($user && password_verify($data['password'], $user->password)) {
                // Login erfolgreich
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['user_name'] = $user->username;
                
                header('Location: ' . BASE_URL . '/home/index');
                exit;
            } else {
                $data['errors']['login'] = 'Ungültige E-Mail oder Passwort.';
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'errors' => []
            ];
        }

        $this->view('user/login', $data);
    }

    public function profile($id = null) {
        // Überprüfen ob Benutzer eingeloggt ist
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/user/login');
            exit;
        }

        $id = $id ?? $_SESSION['user_id'];
        $user = $this->userModel->getUserById($id);

        if ($user) {
            $data = [
                'user' => $user
            ];
            $this->view('user/profile', $data);
        } else {
            die('Benutzer nicht gefunden');
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        
        header('Location: ' . BASE_URL . '/user/login');
        exit;
    }
} 