<?php
    class User extends Controller{

        function __construct(){
            $this->ctg = $this->model('CategoryModel');
            $this->brand= $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
            $this->user = $this->model('UserModel');
        }

        public function login(){
            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproduct();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data =[
                    'email' =>trim($_POST['email']),
                    'pass' => trim($_POST['pass'])
                ];

                $dataErr=[
                    'emailErr' => '',
                    'passErr' => ''
                ];

                if (empty($_POST["email"])) {
                    $dataErr['emailErr'] = "Email is required";
                } else {
                    $data['email'] = $_POST["email"];
                    // check if e-mail address is well-formed
                    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $dataErr['emailErr'] = "Invalid email format";
                    }
                }

                if (empty($_POST["pass"])) {
                    $dataErr['passErr'] = "password is required";
                } else {
                    $data['passErr'] = ($_POST["pass"]);
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if (strlen($_POST["pass"]) <5 || strlen($_POST["pass"]) > 21) {
                        $dataErr['passErr'] = "Chỉ được nhập kí tự và số.6-20 kí tự";
                    }
                }

                if(empty($dataErr['emailErr']) && empty($dataErr['passErr'])){
                    $login = $this->user->finduserbyEaP($data['email'],md5($data['pass']));
                    if(count($login)>0){
                        $_SESSION['notifysucces'] = "Đăng nhập thành công";
                        foreach ($login as $key => $value) {
                            $_SESSION["user_id"] = $value["user_id"];
                            $_SESSION["name"] = $value["last_name"];
                            $_SESSION['email'] = $value['email'];
                        }
                        header('Location: http://localhost/ecommerce');
                    }else{
                        $dataErr['emailErr'] = "Email is incorrect";
                        $dataErr['passErr'] = "Pass is incorrect";
                        $this->view('inc/header',[
                            'data' => $datactg,
                            'databrand' => $databrand,
                            'title' =>'Login'
                        ]);
                        $this->view('user/login',[
                            'data' => $data,
                            'dataErr' => $dataErr
                        ]);
                        $this->view('inc/footer');
                    }
                }else{
                   
                    $this->view('inc/header',[
                        'data' => $datactg,
                        'databrand' => $databrand,
                        'title' =>'Login'
                    ]);
                    $this->view('user/login',[
                        'data' => $data,
                        'dataErr' => $dataErr
                    ]);
                    $this->view('inc/footer');
                }
                
            }else{
                $data =[
                    'email' =>'',
                    'pass' => ''
                ];

                $dataErr=[
                    'emailErr' => '',
                    'passErr' => ''
                ];
                $datactg = $this->ctg->getcategory();
                $databrand = $this->brand->getbrand();
                $dataprd = $this->prd->getproduct();
                $this->view('inc/header',[
                    'data' => $datactg,
                    'databrand' => $databrand,
                    'title' =>'Login'
                ]);
                $this->view('user/login',[
                    'data' => $data,
                    'dataErr' => $dataErr
                ]);
                $this->view('inc/footer');
            }
        }

        public function register(){
            $datactg   = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd   = $this->prd->getproduct();
            $data =[
                'first_name'   => '',
                'last_name'    => '',
                'mobile'       => '',
                'email'        => '',
                'password'     => '',
                'address1'     => '',
                'address2'     => '',
            ];

            $dataErr=[
                'cfpass'   => '',
                'fnameErr' => '',
                'lnameErr' => '',
                'phoneErr' => '',
                'emailErr' => '',
                'passErr'  => '',
                'cfpassErr'=> '',
                'add1Err'  => '',
                'add2Err'  => '',
            ];
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST['fname'])) {
                    $dataErr['fnameErr'] = "first name là trường bắt buộc.";
                } else {
                    $data['first_name'] = $_POST['fname'];
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if (!preg_match("/^[a-zA-Z ]*$/",$data['first_name'])) {
                        $dataErr['fnameErr'] = "Bạn chỉ được nhập chữ cái  và khoảng trắng.";
                    }
                }
                if (empty($_POST['lname'])) {
                    $dataErr['lnameErr'] = "last name là trường bắt buộc.";
                } else {
                    $data['last_name']= $_POST['lname'];
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$data['last_name'])) {
                        $dataErr['lnameErr'] = "Bạn chỉ được nhập chữ cái và khoảng trắng.";
                    }
                }
                if (empty($_POST['phone'])) {
                    $dataErr['phoneErr'] = "Phone là trường bắt buộc.";
                } else {
                    $data['mobile'] = $_POST['phone'];
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if (!preg_match("/^[0-9]{10}+$/",$data['mobile'])) {
                        $dataErr['phoneErr'] = "Bạn chỉ được nhập so 0-9, 10 ki tu";
                    }
                }
                if (empty($_POST["email"])) {
                    $dataErr['emailErr'] = "Email is required";
                } else {
                    $data['email'] = $_POST["email"];
                    // check if e-mail address is well-formed
                    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $dataErr['emailErr'] = "Invalid email format";
                    }
                }
                if (empty($_POST["pass"])) {
                    $dataErr['passErr'] = "password là trường bắt buộc.";
                } else {
                    $data['password'] = ($_POST["pass"]);
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if (strlen($data['password'] ) <5 || strlen($data['password'] ) > 21) {
                        $dataErr['passErr'] = "Chỉ được nhập kí tự và số.6-20 kí tự";
                    }
                }
                if (empty($_POST["cfpass"])) {
                    $dataErr['cfpassErr'] = "Confirm password là trường bắt buộc.";
                } else {
                    $dataErr['cfpass'] = ($_POST["cfpass"]);
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if ($data['password'] != $dataErr['cfpass']) {
                        $dataErr['cfpassErr'] = "Confirm pass ko đúng";
                    }
                }
                if (empty($_POST['address1'])) {
                    $dataErr['add1Err'] = "address1 là trường bắt buộc.";
                } else {
                    $data['address1'] = $_POST['address1'];
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$data['address1'])) {
                        $dataErr['address1'] = "Bạn chỉ được nhập chữ cái  và khoảng trắng.";
                    }
                }
                if (empty($_POST['address2'])) {
                    $dataErr['add2Err'] = "address2 là trường bắt buộc.";
                } else {
                    $data['address2'] = $_POST['address2'];
                    // Kiểm tra và chỉ cho phép nhập chữ và khoảng trắng 
                    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$data['address2'])) {
                        $dataErr['address2'] = "Bạn chỉ được nhập chữ cái  và khoảng trắng.";
                    }
                }


                if(empty($dataErr['fnameErr']) && empty($dataErr['lnameErr']) && empty($dataErr['phoneErr']) && empty($dataErr['emailErr'])
                    && empty($dataErr['passErr'])&&empty($dataErr['cfpassErr']) && empty($dataErr['add1Err']) && empty($dataErr['add2Err'])){
                    
                    $checkmail = $this->user->finduserbyE($data['email']);

                    if(count($checkmail)==1){
                        $dataErr['emailErr'] = "Tài khoản đã tồn tại";
                        $this->view('inc/header',[
                            'data' => $datactg,
                            'databrand' => $databrand,
                            'title' =>'Register'
                        ]);
                        $this->view('user/register',[
                            'data'    => $data,
                            'dataErr' => $dataErr
                        ]);
                        $this->view('inc/footer');
                    }else{
                        $data['password'] = md5($data['password']);
                        $save = $this->user->saveuser($data);
                        if(!$save){
                            $_SESSION['notifysucces'] = "Đăng kí thành công";
                            header('Location: http://localhost/ecommerce/user/login/');
                        }else{
                            $this->view('inc/header',[
                                'data' => $datactg,
                                'databrand' => $databrand,
                                'title' =>'Register'
                            ]);
                            $this->view('user/register',[
                                'data'    => $data,
                                'dataErr' => $dataErr
                            ]);
                            $this->view('inc/footer');
                        }
                    }
                    
                }else{
                    $this->view('inc/header',[
                        'data' => $datactg,
                        'databrand' => $databrand,
                        'title' =>'Register'
                    ]);
                    $this->view('user/register',[
                        'data'    => $data,
                        'dataErr' => $dataErr
                    ]);
                    $this->view('inc/footer');
                }
            }else{
                $this->view('inc/header',[
                    'data' => $datactg,
                    'databrand' => $databrand,
                    'title' =>'Register'
                ]);
                $this->view('user/register',[
                    'data'    => $data,
                    'dataErr' => $dataErr
                ]);
                $this->view('inc/footer');
            }
        }

        function logout(){
            session_destroy();
            header("Location: http://localhost/ecommerce");
        }
    }