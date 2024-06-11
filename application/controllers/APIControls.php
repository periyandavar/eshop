<?php
 

class APIControls extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('Get_data','',TRUE);
  

}
public function api(){

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
			
			case 'signup':
				if($this->isTheseParametersAvailable(array('name','mail','pass'))){
					$name = $_POST['name']; 
					$mail = $_POST['mail']; 
					$pass = $_POST['pass']; 
					//$team=$this->Get_data->get_lot();
					// $password = md5($_POST['password']);
					// $gender = $_POST['gender']; 
					$sql=$this->db->query("SELECT mail,pass FROM register WHERE mail = '$mail'");
					
					
					if($sql->num_rows()!=1){
					  	$query=$this->db->query("INSERT INTO register (name,mail,pass) VALUES ('$name', '$mail','$pass')");
					

						if($query){
							$user = array(
								 
								'username'=>$pass, 
								'email'=>$mail,
								
							);
							$response['error'] = false; 
							$response['message'] = 'User registered successfully'; 
							$response['user'] = $user; 
						}
						else
						{
							$response['error'] = true; 
					$response['message'] = 'Registeration failed'; 
					  
            $response['message']=$response['message']." due to Network Problem";
           
						}
 	 
				}			
				else{
 	     
							$response['error'] = true; 
					$response['message'] = 'Registeration failed'; 
					  
            $response['message']=$response['message']." due to Duplicate Email";
           
 	 }
				}
		else{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available'; 
				}
						
			break; 
			case 'post':
			        
			    	if($this->isTheseParametersAvailable(array('id')))
			    	{
					$id=$_POST['id'];
					$data=array();
					$limit=(int)$id+10;
				    $query = "SELECT * FROM post_table ORDER BY id DESC LIMIT ".$id.", ".$limit."";
                    $query=$this->db->query($query);
                    $records=$query->result();
                    
                    if($query->num_rows()>0)
                    {
                    for($j=0;$j<$query->num_rows();$j++)
                    {
                        $code="<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 90%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
div{
padding: 17px 17px 17px 17px;
}
</style>
";
                        $code =$code.'<div class="card" style="color:black;font-weight:bold;background-color:white">
   
  <strong style="color:dodgerblue"><b>'.$records[$j]->topic.'</b></strong> 
 
  <div class="container">
   
    ';
        // if($records[$j]->type=='msg') $code=$code. $records[$j]->msg;
        // else
        if($records[$j]->type=='img') 
            {
                $code=$code.'<p>'.$records[$j]->msg.'</p> ';
                
                $code=$code."<img width='270' height='315' src='".base_url()."upload/files/".$records[$j]->path."' >";
            }
            else if($records[$j]->type=='file') 
            {
                $code=$code.'<p>'.$records[$j]->msg.'</p> ';
               
                $code=$code."A file is attached to it. <a download href='".base_url()."upload/files/".$records[$j]->path."' >click me to view</a>";
            }
            else if($records[$j]->type=='vdo')
            {
                 $code=$code.'<p>'.$records[$j]->msg.'</p> ';
               $code=$code.'<iframe class="youtube-player" type="text/html" 
width="280" height="260" src="https://www.youtube.com/embed/'.$records[$j]->url.'" 
frameborder="0">';
                // $code=$code.'<iframe width="260" height="215" src="https://www.youtube.com/embed/'.$records[$j]->url.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }
            else
            {
                $code=$code.'<p>'.$records[$j]->msg.'</p> ';
            }
            $code=$code.' 
  </div>
</div>';
 $data1=array("code"=>$code,
								
									
								);
                        array_push($data,$data1);
                    }
                   
                        $response['cnt']=true;
                        $response['code']=$data;
                        $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				else
				{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available';
					$response['result']='failed!!' ;
				}
			
			    break;
			   case 'products':
			    	// if($this->isTheseParametersAvailable(array('id')))
			        {
			            $id=$_GET['id'];
			            $data=array();
			         $query1 = "SELECT * FROM product where locate('$id',category) ORDER BY RAND() DESC LIMIT ".'0'.", ".'10'."";
                    $query1=$this->db->query($query1);
                    $records=$query1->result();
                    
                    if($query1->num_rows()>0)
                    {
                      
			             for($k=0;$k<$query1->num_rows();$k++)
                    {
                        $url=$records[$k]->url;
                        $thumbnail=$records[$k]->thumbnail;
                        $title=$records[$k]->title;
                        
 $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }   $response['cnt']=true;
                        $response['data']=$data;
                        // $response['name']=$list;
                        // $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        // $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
			     case 'product':
			    	// if($this->isTheseParametersAvailable(array('id')))
			        {
			            $id=$_GET['id'];
			            $count=0;
			            $val2=0;
			         //   $count=$_GET['val'];
			         //   $val2=$count+10;
			            $data=array();
			         $query1 = "SELECT * FROM product where locate('$id',category)";
                    $query1=$this->db->query($query1);
                    $records=$query1->result();
                    
                    if($query1->num_rows()>0)
                    {
                      
			             for($k=0;$k<$query1->num_rows();$k++)
                    {
                        $url=$records[$k]->url;
                        $thumbnail=$records[$k]->thumbnail;
                        $title=$records[$k]->title;
                        
 $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }   $response['cnt']=true;
                        $response['f']=1;
                        $response['data']=$data;
                        // $response['name']=$list;
                        // $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                         $response['f']=0;
                        $response['code']="";
                        // $response['limit']=$limit;
                    }
                    $response['count']=$val2;
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
			    case 'trending':
			    	// if($this->isTheseParametersAvailable(array('id')))
			        {
			            $id=0;
			            $limit=(int)$id+50;
			            $data=array();
			         $query1 = "SELECT * FROM product ORDER BY views DESC LIMIT ".$id.", ".$limit."";
                    $query1=$this->db->query($query1);
                    $records=$query1->result();
                    
                    if($query1->num_rows()>0)
                    {
                      
			             for($k=0;$k<$query1->num_rows();$k++)
                    {
                        $url=$records[$k]->url;
                        $thumbnail=$records[$k]->thumbnail;
                        $title=$records[$k]->title;
                        
 $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }   $response['cnt']=true;
                        $response['data']=$data;
                        // $response['name']=$list;
                        $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
			   case 'history':
			    	// if($this->isTheseParametersAvailable(array('id')))
			        {
			            $user=$_GET['username'];
			            $id=0;
			              $query = "SELECT history FROM register where mail='$user'";
                    $query=$this->db->query($query);
                    $records1=$query->result();
			            $limit=(int)$id+50;
			            $data=array();
			         $query1 = "SELECT * FROM product Where Locate(url,'".$records1[0]->history."') LIMIT ".$id.", ".$limit."";
                    $query1=$this->db->query($query1);
                    $records=$query1->result();
                    
                    if($query1->num_rows()>0)
                    {
                      
			             for($k=0;$k<$query1->num_rows();$k++)
                    {
                        $url=$records[$k]->url;
                        $thumbnail=$records[$k]->thumbnail;
                        $title=$records[$k]->title;
                        
 $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }   $response['cnt']=true;
                        $response['data']=$data;
                        // $response['name']=$list;
                        $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
		case 'slides':
			    	// if($this->isTheseParametersAvailable(array('id')))
			        {
			         //   $id=$_POST['id'];
			            
			            $data=array();
			         $query1 = "SELECT * FROM slides ORDER BY RAND() ";
                    $query1=$this->db->query($query1);
                    $records=$query1->result();
                    
                    if($query1->num_rows()>0)
                    {
                      
			             for($k=0;$k<$query1->num_rows();$k++)
                    {
                        $url=$records[$k]->url;
                        $thumbnail=$records[$k]->img;
                        $title=$records[$k]->title;
                        
 $data1=array("id"=>$k+1, "title"=>$title,'description'=>$url,'image_url'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }  
                    // $response['cnt']=true;
                        $response['data']=$data;
                        echo json_encode($data);
                        return true;
                        // $response['name']=$list;
                        // $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        // $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
		case 'slide':
			    	// if($this->isTheseParametersAvailable(array('id')))
			        {
			         //   $id=$_POST['id'];
			            
			            $data=array();
			         $query1 = "SELECT * FROM slide ORDER BY RAND() ";
                    $query1=$this->db->query($query1);
                    $records=$query1->result();
                    
                    if($query1->num_rows()>0)
                    {
                      
			             for($k=0;$k<$query1->num_rows();$k++)
                    {
                        $url=$records[$k]->url;
                        $thumbnail=$records[$k]->img;
                        $title=$records[$k]->title;
                        
 $data1=array("id"=>$k+1, "title"=>$title,'description'=>$url,'image_url'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }  
                    // $response['cnt']=true;
                        $response['data']=$data;
                        echo json_encode($data);
                        return true;
                        // $response['name']=$list;
                        // $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        // $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
		
		case 'products1':
			    	// if($this->isTheseParametersAvailable(array('id')))
			        {
			            $id=0;
			            $limit=10;
			            $data=array();
			         $query1 = "SELECT * FROM product ORDER BY RAND() LIMIT ".$id.", ".$limit."";
                    $query1=$this->db->query($query1);
                    $records=$query1->result();
                    
                    if($query1->num_rows()>0)
                    {
                      
			             for($k=0;$k<$query1->num_rows();$k++)
                    {
                        $url=$records[$k]->url;
                        $thumbnail=$records[$k]->thumbnail;
                        $title=$records[$k]->title;
                        
 $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }   $response['cnt']=true;
                        $response['data']=$data;
                        // $response['name']=$list;
                        // $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        // $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
			case 'home':
			    	if($this->isTheseParametersAvailable(array('id')))
			    	{
					$id=$_POST['id'];
				// 	$search=$_POST['search'];
					$data=array();
					$list=array();
					$vdos=array();
					$limit=(int)$id+10;
					$query="SELECT name FROM category where name!='Today Special : Thriller Movies' and name!='Movies' and name!='Short Films' and name!='Tamil Comedy Scenes'
ORDER BY RAND() LIMIT ".$id.", ".$limit."";
 $query=$this->db->query($query);
 				     array_push($list,"Today Special : Thriller Movies");
 				     array_push($list,"Hollywood Movies");
 				     array_push($list,"Movies");
 				     array_push($list,"Short Films");
 				     array_push($list,"Tamil Comedy Scenes");

                     $record=$query->result();
   if($query->num_rows()>0)
                    {
                    for($j=0;$j<$query->num_rows();$j++)
                    {
				     array_push($list,$record[$j]->name);
//                     for($k=0;$k<$query1->num_rows();$k++)
//                     {
//                         $url=$records[$k]->url;
//                         $thumbnail=$records[$k]->thumbnail;
//                         $title=$records[$k]->title;
                        
//  $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
// 								);
//                         array_push($data,$data1);
//                     }
//                     array_push($vdos,$data);
                    }
                    
                    
                    
                   
                        $response['cnt']=true;
                        // $response['data']=$vdos;
                        $response['name']=$list;
                        $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				else
				{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available';
					$response['result']='failed!!' ;
				}
			
			    break;
			  
			  	case 'list':
			    //	if($this->isTheseParametersAvailable(array('id')))
			    	{
				// 	$id=$_POST['id'];
				// 	$search=$_POST['search'];
					$data=array();
					$list=array();
					$vdos=array();
				// 	$limit=(int)$id+10;
					$query="SELECT * FROM category where name!='Ramayanam' and name!='Mahabharatham' and name!='Shinchan' and name!='Jackichan Sagasngal' and name!='Beyhadh Maya Special'
ORDER BY RAND()";
 $query=$this->db->query($query);
 				     array_push($list,"Ramayanam`https://i.ytimg.com/vi/mKl9BA_jpBQ/hqdefault.jpg?sqp=-oaymwEZCNACELwBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLDT6VVxq6nrvKsdt2LzfJOHXY8PMg");
 				     array_push($list,"Mahabharatham`https://i.ytimg.com/vi/hfjVBJSJ7mY/hqdefault.jpg?sqp=-oaymwEZCNACELwBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLBUxXv9yRuox_RAvDBhNNtjY0eNqA");
 				     array_push($list,"Shinchan`https://i.ytimg.com/vi/Hv2irs0urFg/hqdefault.jpg?sqp=-oaymwEZCNACELwBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLDQs9f7PSlHEMTERq2EhmkVCmp2rw");
 				     array_push($list,"Jackichan Sagasngal`https://i.ytimg.com/vi/1aAIc454sg0/hqdefault.jpg?sqp=-oaymwEZCNACELwBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLCUFNg9SlzfTSf_koiX0fTNWoIK9g");
                    array_push($list,"Beyhadh Maya Special`https://i.ytimg.com/vi/yqLwQWX9xiU/hqdefault.jpg?sqp=-oaymwEZCNACELwBSFXyq4qpAwsIARUAAIhCGAFwAQ==&rs=AOn4CLAEmi-a0PwMdJ0Se8V0xIcKmMaTTw");
                    array_push($list,"Hollywood Movies`https://upload.wikimedia.org/wikipedia/en/1/1f/Conjuring_poster.jpg");
                     $record=$query->result();
   if($query->num_rows()>0)
                    {
                    for($j=0;$j<$query->num_rows();$j++)
                    {
				     array_push($list,$record[$j]->name.'`'.$record[$j]->link);
//                     for($k=0;$k<$query1->num_rows();$k++)
//                     {
//                         $url=$records[$k]->url;
//                         $thumbnail=$records[$k]->thumbnail;
//                         $title=$records[$k]->title;
                        
//  $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
// 								);
//                         array_push($data,$data1);
//                     }
//                     array_push($vdos,$data);
                    }
                    
                    
                    
                   
                        $response['cnt']=true;
                        // $response['data']=$vdos;
                        $response['name']=$list;
                        // $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        // $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
			case 'search':
			        
			    	// if($this->isTheseParametersAvailable(array('id','search')))
			    	{
					$id=$_GET['id'];
					$search=$_GET['search'];
					$data=array();
					$limit=(int)$id+100;
				    $query = "SELECT * FROM product where locate('".$search."',title) or locate('".$search."',tags) or locate('".$search."',description) or locate('".$search."',category) ORDER BY id DESC LIMIT ".$id.", ".$limit."";
				    $response['query']= "SELECT * FROM product where locate('".$search."',title) or locate('".$search."',tags) or locate('".$search."',description) or locate('".$search."',category) ORDER BY id DESC LIMIT ".$id.", ".$limit."";
                    $query=$this->db->query($query);
                    $records=$query->result();
                    
                    if($query->num_rows()>0)
                    {
                    for($j=0;$j<$query->num_rows();$j++)
                    {
                        $url=$records[$j]->url;
                        $thumbnail=$records[$j]->thumbnail;
                        $title=$records[$j]->title;
                        
 $data1=array("title"=>$title,'url'=>$url,'thumbnail'=>$thumbnail
								
									
								);
                        array_push($data,$data1);
                    }
                   
                        $response['cnt']=true;
                        $response['data']=$data;
                        $response['limit']=$limit;
                    }
                    else
                    {
                         $response['cnt']=false;
                        $response['code']="";
                        $response['limit']=$limit;
                    }
 
					$response['error'] = false; 
					$response['message'] = 'Data Fetched !!'; 
				}
				// else
				// {
				// 	$response['error'] = true; 
				// 	$response['message'] = 'required parameters are not available';
				// 	$response['result']='failed!!' ;
				// }
			
			    break;
		
			case 'download':
			    	if($this->isTheseParametersAvailable(array('username'))){
					$user=$_POST['username'];
					// $mail=$_POST['mail'];
				// 	$feed=$_POST['feed'];
				    $path=FCPATH."/public/certificates/";
				    $file=$path.$user.'.pdf';
					
					if(file_exists($file))
					{
						$response['error'] = false; 
						$response['file']="/public/certificates/".$user.'.pdf';
					$response['message'] = 'Your Certificate is downloading..! Please Check your download manager'; 
					$response['result']='success!!';
					}
					else
					{
						$response['error'] = true; 
					$response['message'] = 'Your Certificate is not yet Generated!!'; 
					$response['result']='failed!!';
					}
				}
				else
				{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available';
					$response['result']='failed!!' ;
				}
			
			    break;
			    
			case 'quotes':
			    $dat=array();
					$sql=$query=$this->db->query("SELECT * FROM `quotes` ORDER BY RAND()  ");
					if($query->num_rows()>0)
					{
					    $rows=$query->result();
					 
					   
					    for($i=0;$i<$query->num_rows();$i++)
					    {
					   
					    $data=array("titile"=>$rows[$i]->name,"description"=>$rows[$i]->description,"link"=>$rows[$i]->link
								
									
								);
						array_push($dat, $data);
					    }
						
					$response['error'] = false; 
							$response['message'] = 'Details fetched successfully'; 
							$response['data'] = $dat; 
					}	
					else
						{
						    $data='';
							$response['error'] = true; 
					$response['message'] = 'Unable fetch Data'; 
						}
					
				// $response['content']=$data;
				$response['error'] = false; 
				$response['message'] = 'Data fetched!!'; 
				// $data=file_get_contents("levela.txt");
				// $response['content2']=$data;
				// $data=file_get_contents("levelb.txt");
				// $response['content3']=$data;
				break;
			case 'memes':
			    $dat=array();
					$sql=$query=$this->db->query("SELECT * FROM `memes` ORDER BY RAND()  ");
					if($query->num_rows()>0)
					{
					    $rows=$query->result();
					 
					   
					    for($i=0;$i<$query->num_rows();$i++)
					    {
					   
					    $data=array("titile"=>$rows[$i]->name,"description"=>$rows[$i]->description,"link"=>$rows[$i]->link
								
									
								);
						array_push($dat, $data);
					    }
						
					$response['error'] = false; 
							$response['message'] = 'Details fetched successfully'; 
							$response['data'] = $dat; 
					}	
					else
						{
						    $data='';
							$response['error'] = true; 
					$response['message'] = 'Unable fetch Data'; 
						}
					
				// $response['content']=$data;
				$response['error'] = false; 
				$response['message'] = 'Data fetched!!'; 
				// $data=file_get_contents("levela.txt");
				// $response['content2']=$data;
				// $data=file_get_contents("levelb.txt");
				// $response['content3']=$data;
				break;
			
			case 'version':
			$sql=$query=$this->db->query("SELECT * FROM `version` WHERE id='1'");
					if($query->num_rows()>0)
					{
					    $rows=$query->result();
					 
					   
					    $data=$rows[0]->value;
								
									
							
						
					$response['error'] = false; 
							$response['message'] = 'Details fetched successfully'; 
				// 			$response['data'] = $dat; 
					}	
					else
						{
						    $data='';
							$response['error'] = true; 
					$response['message'] = 'Unable fetch Data'; 
						}
					
				$response['content']=$data;
				$response['error'] = false; 
				$response['message'] = 'Data fetched!!';
				
				break;
			case 'feedback':
				if($this->isTheseParametersAvailable(array('username', 'mail','feed'))){
					$user=$_POST['username'];
					$mail=$_POST['mail'];
					$feed=$_POST['feed'];
					$sql=$query=$this->db->query("INSERT INTO feed_back(name,mail,msg,subject) VALUES('$user','$mail','$feed','HackStarz App')");
					if($sql)
					{
						$response['error'] = false; 
					$response['message'] = 'Feedback Submitted'; 
					$response['result']='success!!';
					}
					else
					{
						$response['error'] = true; 
					$response['message'] = 'Network Error'; 
					$response['result']='failed!!';
					}
				}
				else
				{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available';
					$response['result']='failed!!' ;
				}
				break;
			case 'addhistory':
				if($this->isTheseParametersAvailable(array('username','url'))){
					$user=$_POST['username'];
					$id=$_POST['url'];
					$sql=$query=$this->db->query("UPDATE register SET history=CONCAT('".$id.",',history) WHERE mail='".$user."'");
					$sql=$query=$this->db->query("UPDATE product SET views=views+1 WHERE url='".$id."'");
				// 	if($query->num_rows()==1)
				// 	{
				// 	    $records=$query->result();
				// 		if($records[0]->events=="A")
				// 			$val="HACK-ANJAC";
				// 		elseif ($records[0]->events=="B") {
				// 			$val="STARZ-ANJAC";
				// 		}
				// 		else
				// 			$val="Both";
				// 		$data=array("team"=>$records[0]->Team,
				// 					"clg"=>$records[0]->college,
				// 					"dept"=>$records[0]->dept,
				// 					"mobile"=>$records[0]->mobile,
				// 					"mail"=>$records[0]->mail,
				// 					"events"=>$val,
				// 					"p1"=>$records[0]->p1,
				// 					"p2"=>$records[0]->p2,
				// 					"p3"=>$records[0]->p3,
				// 					"p4"=>$records[0]->p4,
				// 					"p5"=>$records[0]->p5,
				// 					"p6"=>$records[0]->p6,
				// 					"p7"=>$records[0]->p7,
				// 				);
				// 		$response['error'] = false; 
				// 			$response['message'] = 'Details fetched successfully'; 
				// 			$response['data'] = $data; 
				// 	}	
				// 	else
				// 		{
				// 			$response['error'] = true; 
				// 	$response['message'] = 'Unable fetch Data'; 
				// 		}
					$response['error'] = false; 
							$response['message'] = 'Details fetched successfully'; 
					
				}else{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available'; 
				}

				break;
			case 'feedback1':
				if($this->isTheseParametersAvailable(array('username','feed'))){
					$user=$_POST['username'];
					// $mail=$_POST['mail'];
					$feed=$_POST['feed'];
					$sql=$this->db->query("INSERT INTO team_feedback(team,content) VALUES('$user','$feed')");
					if($sql)
					{
						$response['error'] = false; 
					$response['message'] = 'Feedback Submitted'; 
					$response['result']='success!!';
					}
					else
					{
						$response['error'] = true; 
					$response['message'] = 'Network Error'; 
					$response['result']='failed!!';
					}
				}
				else
				{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available';
					$response['result']='failed!!' ;
				}
				break;
			case 'login':
				
				if($this->isTheseParametersAvailable(array('username', 'password'))){
					
					$username = $_POST['username'];
					$password = ($_POST['password']); 
					
					$sql=$this->db->query("SELECT mail,pass FROM register WHERE mail = '$username' AND pass = '$password'");
					
					
					if($sql->num_rows()==1){
							$records=$sql->result();
						
				// 		$row=mysqli_fetch_array($sql);
						$user = array(
							'email'=>$records[0]->mail,
							'username'=>$records[0]->pass
							
						);
						
						$response['error'] = false; 
						$response['state']=1;
						$response['message'] = 'Login successfull'; 
						$response['user'] = $user; 
					}else{
						$response['error'] = false; 
						$response['state']=0;
						$response['message'] = 'Invalid username or password';
					}
				}
			break; 
			
			default: 
				$response['error'] = true; 
				$response['message'] = 'Invalid Operation Called';
		}
		
	}else{
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	echo json_encode($response);
}	
	function isTheseParametersAvailable($params){
		
		foreach($params as $param){
			if(!isset($_POST[$param])){
				echo $param;
				return false; 
			}
		}
		return true; 
	}
}