<?php
class Pages extends Controller
{
    public function __construct()
    {
        //$this->userModel = $this->model('User');
    }

    public function index()
    {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    public function home()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Studentmodels.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Teachermodels.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Parentmodels.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Adminmodels.php';
        $s = new Studentmodels;
        $t = new Teachermodels;
        $p = new Parentmodels;
        $a = new Adminmodels;
        
        //array for student by class
        $studentsByClass=$s->getStudentsByClass();
        $class_names='[';
        $class_students_counts='[';
        foreach($studentsByClass as $c){
            $class_names.="'".$c->class_name."',";
            $class_students_counts.="'".$c->students_count."',";
        }
        $class_names.=']';
        $class_students_counts.=']';
        

        $this->view('home', ['count_class'=>$studentsByClass, 'x_students_by_class'=>$class_names,'y_students_by_class'=>$class_students_counts,'students_m'=>$s->getStudentsMale(), 'students_f'=>$s->getStudentsFemale(), 'students'=>$s->get(), 'teachers'=>$t->get(), 'parents'=>$p->get(), 'admins'=>$a->get()]);
    }

    public function students()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Studentmodels.php';
        $m = new Studentmodels;
    
        if(isset($_GET['w'])){
            $this->view('students', $m->getsearch($_GET['w']));
        }else{
            $this->view('students', $m->get());
        }
        
    }

    public function teachers()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Teachermodels.php';
        $m = new Teachermodels;
        $this->view('teachers', $m->get());
    }

    public function parents()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Parentmodels.php';
        $m = new Parentmodels;
        $this->view('parents', $m->get());
    }

    public function admins()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/mvcloginregister/app/models/Adminmodels.php';
        $m = new Adminmodels;
        $this->view('admins', $m->get());
    }
}
