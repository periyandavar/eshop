<?php

class Get_data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->model('model_name', '', TRUE);
    }
    public function get_lot()
    {
        $query="SELECT lot_name FROM lot where status=' ' AND allocated_for=' ' ORDER BY RAND() LIMIT 1";
        $query=$this->db->query($query);
        $records=$query->result();
        if ($query->num_rows()==1) {
            return $records[0]->lot_name;
        } else {
            return false;
        }
    }

    public function authenticate($name, $pass)
    {
        $query="SELECT pass FROM login where mail = '$name'";
        $query=$this->db->query($query);
        $records=$query->result();
        if ($query->num_rows()==1) {
            $pass2=$records[0]->pass;
            // $hash =sha1($pass);
            // $hash = md5($pass);
            // $hash = sha1($hash);
			// echo $pass2. "<br>";
			// echo $hash;
            if ($this->verify_me($pass, $pass2)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function change_pass($pass1, $pass2, $mail)
    {
        $query="SELECT pass FROM login where mail = '$mail'";
        $query=$this->db->query($query);
        $pass3='';
        $records=$query->result();
        if ($query->num_rows()==1) {
            $pass3=$records[0]->pass;
        }
        if ($pass1==$pass3) {
            $query="UPDATE login SET pass='$pass2' where mail = '$mail'";
            $query=$this->db->query($query);
            return $query;
        } else {
            return 0;
        }
    }
    public function depts12()
    {
        $sql=$this->db->query("select name from category");
        return $sql->result();
    }
    public function authenticate2($name, $pass)
    {
        $query="SELECT Team FROM register where mail = '$name'";
        $query=$this->db->query($query);
        $records=$query->result();
        if ($query->num_rows()==1) {
            $pass2=$records[0]->Team;
            // return $records;
            if ($pass==$pass2) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function crop($x, $y, $w, $h, $label)
    {
        $query="UPDATE crop SET x='$x', y='$y', width='$w',height='$h' WHERE id = '".$label."' ";
        $query=$this->db->query($query);
        return $query;
    }
    public function get_crop($label)
    {
        $query="SELECT * FROM crop WHERE id = '".$label."' ";
        $query=$this->db->query($query);
        $records=$query->result();
        if ($query->num_rows()==1) {
            $data=array();
            $data['x']=$records[0]->x;
            $data['y']=$records[0]->y;
            $data['h']=$records[0]->height;
            $data['w']=$records[0]->width;
            return $data;
        }
        return false;
    }
    private function custom_password_hash($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }

    public function register_data($clg, $dept, $team, $mobile, $mail, $event, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $url)
    {
        $query="Insert into register (college,dept,team,mobile,mail,events,p1,p2,p3,p4,p5,p6,p7,st,cnt,url)  values('$clg','$dept','$team','$mobile','$mail','$event','$p1','$p2','$p3','$p4','$p5','$p6','$p7','0','5','$url');";
        $query1="UPDATE lot SET status='1', allocated_for='$clg$dept' where lot_name='$team';";
        $query=$this->db->query($query);
        if ($query) {
            $query1=$this->db->query($query1);
        }
        return $query;
    }
    public function submit_data($name, $mail, $subject, $message)
    {
        $query="Insert into feed_back (name,mail,subject,msg)  values('$name','$mail','$subject','$message');";

        $query=$this->db->query($query);
        return $query;
    }
    public function verify_me($val1, $val2)
    {
        return password_verify($val1, $val2);
    }
    public function register_data1(
        $clg,
        $dept,
        $team,
        $mobile,
        $mail,
        $event,
        $p1,
        $p2,
        $p3,
        $p4,
        $p5,
        $p6,
        $p7,
        $url
    ) {
        $query="Insert into register (college,dept,team,mobile,mail,events,p1,p2,p3,p4,p5,p6,p7,st,cnt,url)  values('$clg','$dept','$team','$mobile','$mail','$event','$p1','$p2','$p3','$p4','$p5','$p6','$p7','1','5','$url');";
        $query1="UPDATE lot SET status='1', allocated_for='$clg$dept' where lot_name='$team';";
        $query=$this->db->query($query);
        if ($query) {
            $query1=$this->db->query($query1);
        }
        return $query;
    }
    public function passs()
    {
        // $this->input->post('email')
        $hash=$this->custom_password_hash("welcome");
        //$encrypted_string = $this->encrypt->encode($pass);
        // $hash =sha1($hash);
        // $hash = md5($hash);
        // $hash = sha1($hash);
        return $hash;
    }
}
