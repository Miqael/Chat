<?php

class SiteController extends Controller
{
    public $u_id = null;

    public $lat = null;

    public $lng = null;

    function init(){
        if(isset(Yii::app()->session['user_id'])){
            $this->u_id = Yii::app()->session['user_id'];
        }
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr) );

        if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude'])
                && $geoplugin['geoplugin_latitude'] != 0 && $geoplugin['geoplugin_longitude'] != 0) {

            $this->lat = $geoplugin['geoplugin_latitude'];
            $this->lng = $geoplugin['geoplugin_longitude'];
        }
    }
    
    public function actionIndex(){
        if($this->u_id){
            $where = 'lat IS NOT NULL AND id != '.$this->u_id;
        }else{
            $where = 'lat IS NOT NULL';
        }
        $users =  Yii::app()->db->createCommand()
            ->select('*')
            ->from('users')
            ->where($where)
            ->queryAll();
        $this->render('index',array('users'=>$users));
    }

    public function actionRegister(){
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            $this->redirect(Yii::app()->baseUrl);
        }
        $data = $_POST;
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            echo json_encode(array('status'=>false,'msg'=>'Please Enter a Valid email !'));die;
        }
        if($data['password'] != $data['confirm_password']){
            echo json_encode(array('status'=>false,'msg'=>'Passwords Mismatch !'));die;
        }
        $usr =  Yii::app()->db->createCommand()
            ->select('id')
            ->from('users')
            ->where('email=:email', array(':email'=>$data['email']))
            ->queryRow();
        if($usr){
            echo json_encode(array('status'=>false,'msg'=>'This email already exist !'));die;
        }
        $sql = "INSERT INTO users SET email = :email , password = :password , lat = :lat , lng = :lng ";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":email", $data['email']);
        $command->bindValue(":password", md5($data['password']) );
        $command->bindValue(":lat", $this->lat);
        $command->bindValue(":lng", $this->lng);
        $command->execute();
        Yii::app()->session['user_id'] = Yii::app()->db->getLastInsertID();
        echo json_encode(array('status'=>true));
        die;
    }

    public function actionLogin(){
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            $this->redirect(Yii::app()->baseUrl);
        }
        $data = $_POST;
        $usr =  Yii::app()->db->createCommand()
            ->select('id')
            ->from('users')
            ->where('email=:email AND password = :password', array(':email'=>$data['email'] , ':password'=>md5($data['password'])))
            ->queryRow();
        if($usr){
            Yii::app()->session['user_id'] = $usr['id'];
            $u_id = $usr['id'];
            echo json_encode(array('status'=>true));die;
        }else{
            echo json_encode(array('status'=>false,'msg'=>'Wrong Email Or Password !'));die;
        }
    }

    public function actionLogout(){
        unset(Yii::app()->session['user_id']);
        $this->redirect(Yii::app()->baseUrl.'/site/index');
    }

    public function actionError(){
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionEditUser(){
        $response = array('status'=>true);
        $data = $_POST;
        $password = null;
        $sql = "UPDATE users SET
                    email = :email ,
                    lat = :lat ,
                    lng = :lng ,
                    name = :name ,
                    image = :image ,
                    nick_name = :nick_name,
                    gender = :gender ,
                    birthday = :birthday ,
                    search_type_id = :search_type_id";
        if(strlen(trim($data['password'])) > 1 && $data['password']==$data['c_password'] ){
            $password = md5($data['password']);
            $sql .= " , password = :password ";
        }
        $sql .= " WHERE id=:id";
        $command = Yii::app()->db->createCommand($sql);
        if($password){
            $command->bindParam(":password", $password );
        }
        if(strlen(trim($data['search_type_id'])) == 0){
            $data['search_type_id'] = null;
        }
        $command->bindParam(":search_type_id", $data['search_type_id'] );
        $command->bindParam(":email", $data['email']);
        $command->bindParam(":name", $data['name']);
        $command->bindParam(":image", $data['image']);
        $command->bindParam(":nick_name", $data['nick_name']);
        $command->bindParam(":gender", $data['gender']);
        $command->bindParam(":birthday", $data['birthday']);
        $command->bindParam(":lng", $this->lng);
        $command->bindParam(":lat", $this->lat);
        $command->bindParam(":id", $this->u_id);
        $command->execute();
        echo json_encode($response);
        die;
    }

    public function actionGetUser(){
        $usr =  Yii::app()->db->createCommand()
            ->select('email,name,nick_name,search_type_id,birthday,gender,image')
            ->from('users')
            ->where('id=:id', array(':id'=>$this->u_id))
            ->queryRow();
        echo json_encode($usr);die;
    }

    public function actionUploader(){
        $path =  realpath(Yii::app()->basePath . '/../images/users');
        $FileUploader = new FileUploader();
        if (isset($_GET['qqfile'])) {
            $imgName = $_GET['qqfile'];
        } elseif (isset($_FILES['qqfile'])) {
            $imgName = $_FILES['qqfile']['name'];
        }
//            var_dump($_REQUEST);die;
        $explode = explode('.', $imgName);
        $ext = end($explode);
        $name = md5(microtime()) . '.' . $ext;
        if($ext){
            // if (!is_dir(WWW_ROOT . 'system' . DS . 'bulletinPic' . DS.$this->u_id)){
            // mkdir(WWW_ROOT . 'system' . DS . 'bulletinPic' . DS.$this->u_id,true);}
            $test = $FileUploader->upload($path.'/');
//                var_dump($test);die;
            $response['fileName'] = $name;
//                var_dump($response);die;
            $response['success'] = true;
            @rename($path. DIRECTORY_SEPARATOR .$imgName , $path.DIRECTORY_SEPARATOR.$name);
            $img = array();
            $img[$name] = $name;
            list($width, $height) = getimagesize( $path.DIRECTORY_SEPARATOR.$name);
            if($width > $height){
                $resolution = $height/$width;
                $width = 300;
                $height = round($width*$resolution);
            }else{
                $resolution = $width/$height;
                $height = 300;
                $width = round($height*$resolution);
            }
            $response['name'] = $imgName;
            $response['width'] = $width;
            $response['height'] = $height;
            $echo = json_encode($response);
            echo $echo;
            die;
        }else{
            $response['success'] = false;
            $echo = json_encode($response);
            echo $echo;
            die;
        }
    }

    public function actionInsertUsers(){
//        echo json_encode($_POST);die;
//        foreach($_POST['photos'] as $val){
//            $sql = "INSERT INTO users SET
//                                        name = :name ,
//                                        nick_name = :nick_name ,
//                                        image = :image ,
//                                        email = :email ,
//                                        gender = '1' ,
//                                        birthday = '1988-05-05',
//                                        lat = :lat ,
//                                        lng = :lng ";
//            $command = Yii::app()->db->createCommand($sql);
//            $command->bindParam(":email", $val['photo_id']);
//            $command->bindParam(":name", $val['owner_name']);
//            $command->bindParam(":image", $val['photo_file_url']);
//            $command->bindParam(":nick_name", $val['owner_name']);
//            $command->bindParam(":lng", $val['longitude']);
//            $command->bindParam(":lat", $val['latitude']);
//            $command->execute();
//        }
//        echo json_encode($_POST);die;
    }
}