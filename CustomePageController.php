<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors',1);

class CustomePageController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct()
	 {
	    Parent::__construct();
	    $this->load->model('CustomModel');
		
	    $this->load->library('BreadcrumbComponent');
	    $this->breadcrumbs=new BreadcrumbComponent();
	   
	     $this->load->library('Mylibrary');
	     $this->load->library('Themeonelayoutwidgets');
	     $this->load->library('Staticpagefunctions');
	     $this->Mylibrary=new Mylibrary();
	     $this->Themeonelayoutwidgets=new Themeonelayoutwidgets();
	     $this->Staticpagefunctions=new Staticpagefunctions();
	     
	 }
	
	public function getNewVisiotrs(){
	}
	 
	  public function getVisitorCount()
	 {
	 $result=$this->MenuModel->getVisitorCount();
	 return $result;
	 }
	 
	  public function angularhomepagecontent()
	 {
	     $postdata = file_get_contents("php://input");
	     $request = json_decode($postdata);
	     
	   $params=array('ulbid'=>$request->ulbid,'langId'=>$this->session->userdata('lang_Id'),'is_homepage_content'=>1);
	   
	   $result=$this->MenuModel->angularhomepagecontent($params);
	   echo json_encode($result);
	 }
	 
	 public function angularSliderData()
	 {
	     $postdata = file_get_contents("php://input");
	     $request = json_decode($postdata);
	     
	   $params=array('ulbid'=>$request->ulbid,'langId'=>$this->session->userdata('lang_Id'));
	   
	  
	   $result=$this->MenuModel->anggetsliderdata($params);
	   echo json_encode($result);
	 }
	 public function changLanguage()
	 {
	     
	     if($this->session->userdata('lang_Id')=='1')
	     {
	         $this->session->unset_userdata('lang_Id');
	         $this->session->unset_userdata('langtext');
	         $this->session->set_userdata('lang_Id','2');
	         $this->session->set_userdata('langtext','English');
	         
	     }
	     else
	     {
	         $this->session->unset_userdata('lang_Id');
	         $this->session->unset_userdata('langtext');
	         $this->session->set_userdata('lang_Id','1');
	         $this->session->set_userdata('langtext','తెలుగు');
	     }
	     
	    
	     
	      
	     
	  
	 }
	 
	/**** Library functions ****/
		public function widget_desc($widget_id)
	{
	    $params=array('widget_id'=>$widget_id);
        $result=$this->MenuModel->widget_desc($params);
	    return $result;
	}
	
    public function getMenuTypeId($params)
    {
       $params=array('widget_id'=>$params);
        $result=$this->MenuModel->getMenuTypeId($params);
	    return $result;
    }
    
    public function footerWebsitePolicies($ulbid)
    {
     
        $result=$this->Themeonelayoutwidgets->footerWebsitePoliciess($ulbid);
        return $result;
    }
    
    public function getGovtLinkstData($gove_widgets)
    {
        $result=$this->Themeonelayoutwidgets->getGovtLinkstData($gove_widgets);
        return $result;
    }
    
    public function getallwidgetingivenLayout()
	{
	   
	   
	    $result=$this->Themeonelayoutwidgets->getallwidgetingivenLayout();
	    
	    return $result;
	    
	    
	    
	}
    
    
	
	public function getWidgetData($widget_id)
	{
	    
	   
	    $params=array('widget_id'=>$widget_id);
	    $result=$this->MenuModel->getWidgetData($params);
	    $widget_type=$result[0]['widget_type'];
	    $params=array('widget_id'=>$widget_id,'widget_type'=>$widget_type,'ulbid'=>$this->session->userdata('ulb_id'),'langId'=>$this->session->userdata('lang_Id'));
	   
	    $result=$this->Themeonelayoutwidgets->getIndwidgetdata($params);
	    //echo $this->db->last_query();
	    
	    return $result;
	    
	    
	    
	}
	 
	 public function updatePageContent()
	 {
	     
	     if($this->session->userdata('username'))
        	    {
                    	     if($this->input->post('save'))
                    	    {
                    	        $content=str_replace("'", "\'", $this->input->post('content'));
                                $pageid=$this->input->post('pageid');
                                
                                
                                
                    	        $params=array(
                    	            'pageid'=>$pageid,
                    	            'content'=>$content
                    	            );
                    	        $result=$this->CustomModel->updatePageContent($params);
                            	        if($result=='1')
                            	        {
                            	           
                            	            
                            	            
                            	            $this->session->set_flashdata('message','Page Updated successfully');
                            	        }
                            	        else
                            	        {
                            	            $this->session->set_flashdata('message','Unable to update page , Please try again');
                            	            
                            	        }
                            	        
                            	        redirect($this->input->post('page'));
        	        
        	                }
        	    }
	    else
	    {
	        redirect('login');
	    }
	     
	 }
	 
	 public function getAlbumPhotos()
	 {
	     $album_id=$this->uri->segment(3);
	     $data['content'][0]['content']=$this->Staticpagefunctions->getAlbumPhotos($album_id);
	     $this->getPageContent();
	 }
	 
	 public function pageInformation($params)
	 {
	   //  $pageinfo=$this->MenuModel->getcustomPageInfo($params);
	   //  return $pageinfo;
	 }
	 
	public function getPageContent()
	{
	    
		
		
		
		
	     $ulbid = "250";
	    $this->session->set_userdata('ulbid',$ulbid);
	    // get Townprofile details
	    $params=array('ulbid'=>$ulbid);
	    $data['townprofile_details']=$this->MenuModel->getTownProfiledata($params);
	    
	    $target="";
		$class="";
	    $this->breadcrumbs->add('Home', base_url(),$target,$class);
	    $this->session->set_userdata('ulb_id',$ulbid);
	    if(!$this->session->userdata('lang_Id'))
	    {
	        
	        $this->session->set_userdata('lang_Id',1);
	        $this->session->set_userdata('langtext','Telugu');
	        
	    }
	     $page=$this->uri->segment(1);
		 
		 $params=array(
		'ip_address'=>$this->input->ip_address(),
		'url'=>$page,
		'date'=>date('Y-m-d'),
		'ts'=>date('Y-m-d H:i:s')
		);
		
		
		
		$this->MenuModel->insertVisitor($params);
		 
		 
	    $params=array('c.ulbid'=>$ulbid,'controller'=>$page);
	    $data['pageinfo']=$this->MenuModel->getpageInfo($params);
	    
	    
	    /** taking if it is common page or not to get left side menu **/
	    
	    $is_common_page=$data['pageinfo'][0]->is_common_page;
	    $left_menu_id=$data['pageinfo'][0]->menu_type_id;
		
		
		$paramsvisiotr=array(
		'ip_address'=>$this->input->ip_address(),
		'url'=>base_url(),
		'date'=>date('Y-m-d'),
		'ts'=>date('Y-m-d H:i:s')
		);
		
		$this->MenuModel->insertVisitor($paramsvisiotr);
	    
	    
	    
	    if($data['pageinfo'][0]->is_draft==1)
	    {
	       
	        echo "<h1>Page not found</h1>";
	        exit;
	    }
	    
	  /**************************************************************************************** page info ************/
	    
	    
	    $params=array('ulbid'=>$ulbid,'controller'=>$page);
	    
	    $data['pageinformation']=$this->pageInformation($params);
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    $data['pageinfo']=$this->MenuModel->getcustomPageInfo($params);
	    
	    $data['description']=$data['pageinfo'][0]->meta_desc;
	    $data['keywords']=$data['pageinfo'][0]->pagekeywords;
	    $data['subject']=$data['pageinfo'][0]->meta_subject;
	    
	    $params=array('ulbid'=>$ulbid);
	    $data['ulbinfo']=$this->MenuModel->getULBInfo($params);
	    //print_r($data['ulbinfo']);
	    
	    $data['footertitle']=$data['ulbinfo'][0]->ulbname." ".$data['ulbinfo'][0]->ulb_type_desc;;
	    
	    $data['ulbnametelutu']=$data['ulbinfo'][0]->ulbtelugu." ".$data['ulbinfo'][0]->ulb_type_desctelugu;
	    $data['ulbnameenglish']=$data['ulbinfo'][0]->ulbname." ".$data['ulbinfo'][0]->ulb_type_desc;
	    $data['generalsettings']=$this->MenuModel->getULBgeneralsettings($params);
	    
	    
	    $data['logo']=$data['generalsettings'][0]['file_path'];
	    $data['logo_alt']=$data['generalsettings'][0]['alt'];
	    $data['logo_title']=$data['generalsettings'][0]['title'];
	    if($data['generalsettings'][0]['file_path'] =='')
	    {
	        $data['feviicon']="assets/cdma/img/logo1.png";
	    }
	    else
	    {
	        $data['generalsettings'][0]['file_path'];
	        $data['feviicon']=$data['generalsettings'][0]['file_path'];
	    }
	    
	    
	    $data['ulbid']=$ulbid;
	    
	    $params=array('ulbid'=>$ulbid,'langId'=>$this->session->userdata('lang_Id'),'menu_type_id'=>1);
	    $result=$this->Mylibrary->getMenus($params);
	    $data['mainmenus']=$result['mainmenu'][0];
	    $data['submenus']=$result['submenu'][0];
	    $data['subsubmenus']=$result['chilemenu'][0];
	    
	    /*** left menus **/
	    
	    $params=array('ulbid'=>$ulbid,'langId'=>$this->session->userdata('lang_Id'),'menu_type_id'=>2);
	    $result=$this->Mylibrary->getMenus($params);
	    $data['leftmainmenus']['leftmainmenus']=$result['mainmenu'][0];
	    $data['leftsubmenus']['leftsubmenus']=$result['submenu'][0];
	    $data['leftsubsubmenus']['leftsubsubmenus']=$result['chilemenu'][0];
	   
	    /** footer menus **/
	    
	    $params=array('ulbid'=>$ulbid,'langId'=>$this->session->userdata('lang_Id'),'menu_type_id'=>3);
	    $result=$this->Mylibrary->getMenus($params);
	    $data['footermainmenus']['footermainmenus']=$result['mainmenu'][0];
	    $data['footerleftsubmenus']['footerleftsubmenus']=$result['submenu'][0];
	    $data['footerleftsubsubmenus']['footerleftsubsubmenus']=$result['chilemenu'][0];
	   
	   $params=array('ulbid'=>$ulbid,'controller'=>$page);
	   if($page=='search')
	   {
	       
	       //echo $this->input->post('search_keyword');exit;
	       if($this->input->post('search_keyword')!='')
	       {
	            $serackkeyname=$this->input->post('search_keyword');
	            
    	       $params=array('ulbid'=>$ulbid,'keyword'=>$this->input->post('search_keyword'));
    	       $where=array('ulbid'=>$ulbid);
    	       $searchContent=$this->CustomModel->getsearchData($params,$where);
    	       $content="";
    	       
    	       if(empty($searchContent)){
    	       $content="<div class='alert alert-warning'>No result found for keyword - '$serackkeyname' </div></br></br></br></br></br></br></br></br></br></br>";
    	       } else {
    	           
    	           $content="<div class='alert alert-success'>You have searched with keyword  - '$serackkeyname'  Results below</div>";
    	       }
    	       
    	       foreach($searchContent as $key=>$val)
    	       {
    	           
    	               
    	           if($val['is_custumlink']==1)
    	           {
    	               $url=$val['site_controller'];
    	           }
    	           else
    	           {
    	               $url=$val['site_controller'];
    	           }
    	           $content.="<div>";
    
                        $content.="<div><a href='".$url."' class='ser_link_tex' target='_blank'> ".$val['page_name']." </a></div>";
                        $content.="<div class='ser_url'> <a href='".$url."' class='ser_url' target='_blank'>".$url."</a></div>";
                        $content.="<div class='ser_dectex'>".substr(strip_tags($val['content']),0,200)."</div>";
                    $content.="</div>";
                    
                    $content.="<hr style='margin-top:10px; margin-bottom:10px;'>";
                    
                        	       
    	       
    	        
    	       
    	       }
	       }
	       else
	       {
	           $content="<div class='alert alert-warning'>Result not found with this keyword</div>";
	       }
	       
	       
	       $sidebarid=$data['content'][0]['page_sidebars_id']=4;
	       $data['content'][0]['content']=$content;
	     
	   }
	  
	   else
	   {
	      
	       
	   
	   $data['content']=$this->CustomModel->getpageData($params);
	   //$data['content'][0]['content']=str_replace('/assets',base_url().'assets/',$data['content'][0]['content']);
	   if($data['content'][0]['page_sidebars_id'] >=5)
	   {
	       $default_page_sidebar=$this->CustomModel->getpageSidebarId();
	       $data['content'][0]['page_sidebars_id']=$default_page_sidebar['superadmin_defautl_layout'];
	   }
	   $parameters=array('page_sidebars_id'=>$data['content'][0]['page_sidebars_id']);
	  
	   
	  //print_r($data['content']);
	   
    	   if($data['content']['is_code_page']=='1')
    	   {
    	     
    	     $params=array('ulbid'=>$ulbid,'langId'=>$this->session->userdata('lang_Id'),'menu_type_id'=>1);
    	     if($data['content']['controller']=='sitemap')
    	     {
    	        
    	     $data['content'][0]['content']=$this->Staticpagefunctions->getSitemap($params);
    	     
    	    // print_r($data['content'][0]['content']);
    	     //$data['content'][0]['content']=$this->Staticpagefunctions->getSitemap($params);
    	     }
    	     else if($data['content']['controller']=='feedback')
    	     {
    	         
    	         $data['content'][0]['content']=$this->Staticpagefunctions->getFeedbackform($ulbid);
    	     }
    	     else if($data['content']['controller']=='albums')
    	     {
    	         
    	         echo $data['content'][0]['content']=$this->Staticpagefunctions->getAlbums($ulbid,$this->session->userdata('langId'));
    	     }
    	     
    	     
 /*************************************************************************************************************************************/  	       
    	      // echo $sidebarid=$data['content'][0]['page_sidebars_id'];
    	      $sidebarid=$data['content']['page_sidebars_id'];
    	      
    	       $this->breadcrumbs->add($data['content']['page_name'], $base_url.$data['content']['site_controller'],$target,$class); 
    	   }
    	   else
    	   {
    	  
    	   
    	    $sidebarid=$data['content'][0]['page_sidebars_id'];
    	    //echo $sidebarid=$page_sidebars_id;
    	   }
	   }
	   
	     $category_id=$this->uri->segment('2');
	    
	    // if requested page id is category getting all posts of that category
	    
	    if($category_id !='')
	    {
	    //$params=array('category_id'=>$category_id);
	    $params=array('site_controller'=>$category_id);
	    $category_name=$this->CustomModel->getCategoryName($params);
	   // print_r($category_name);
	    $params=array('category_id'=>$category_name['page_id']);
	    $posts=$this->CustomModel->getCategoryPosts($params);
	    $category_content="";
	    $category_content.="<h3 class='inner_heading'>".$category_name['page_name']."</h3><br>";
    	    foreach($posts as $key=>$val)
    	    {
    	        if($val['is_custumlink']=='1'){$base_url="";}else{$base_url=base_url(); }
                if($val['is_target_blank']=='2'){$target="target='_blank'";}else{$target="target=''"; }
                 if($val['is_alert']=='1'){$class="class='confirmation'";}else{$class="class=''"; }
                 
    	     
                
                
        $category_content.="<div>";
			$category_content.="<div class='col-md-12 note_style'>";
			   $category_content.="<div class='col-md-1 note_box'>";
				   $category_content.="<div class='note_circle'>";
				   $category_content.="<i class='fa fa-bell'></i>";
				   $category_content.="</div>";
			   $category_content.="</div>";
			   $category_content.="<div class='col-md-11 note_top'>";
				   $category_content.="<p><a href='".$base_url.$val['site_controller']."' ".$target." ".$class.">".$val['page_name']."</a></p>";
				   $category_content.="<div class='post-details'> Published on : <span class='post_ti'>".date('d-m-Y H:i:s',strtotime($val['datetime']))."</span> , Posted by : <span class='post_ti'> ".$val['author']." </span></div>";
			   $category_content.="</div>";
			$category_content.="</div>";
		$category_content.="</div>";
                
                
                
                
                
                
                
                
                
    	    } 
    	    
    	    $data['content'][0]['content']=$category_content;
    	    $sidebarid=1;
    	    
    	    if($category_name['is_custumlink']=='1'){$base_url="";}else{$base_url=base_url(); }
            if($category_name['is_target_blank']=='2'){$target="target='_blank'";}else{$target="target=''"; }
            if($category_name['is_alert']=='1'){$class="class='confirmation'";}else{$class="class=''"; }
    	    
    	    $this->breadcrumbs->add($category_name['page_name'], $base_url.$category_name['site_controller'],$target,$class); 
	    }
	     
	    //echo $data['content'][0]['content'];
	   
	   $album_id=$this->uri->segment('4');
	   if(is_numeric($album_id))
	   {
	      $data['content'][0]['content']=$this->Staticpagefunctions->getAlbumPhotos($album_id);
	      $album_name=$this->Staticpagefunctions->getAlbumName($album_id);
	      
	      
	      $this->breadcrumbs->add('Phot gallery', $base_url.$ulbid."/albums",$target,$class);
	      $this->breadcrumbs->add($album_name[0]['album_desc'], $base_url."/albums/photos",1,$class);
	   }
	   
	   
	   
	   //echo $data['content'][0]['content'];
	   
	  
	   
	   $params_sidebar=array('layout_id'=>$sidebarid);
	   
	   $data['sidebar_list']=$this->CustomModel->sidebar_list($params_sidebar);
	   //print_r($data['sidebar_list']);
	   
	   
	   //print_r($data['content']);
	   
	   
	   
	   
	   
	   $params=array('ulbid'=>$ulbid,'langId'=>$this->session->userdata('lang_Id'));
	   $data['headerNews']=$this->MenuModel->getHeaderNews($params);
	   
	   $params=array('ulbid'=>$ulbid);
	   $themefolder=$this->MenuModel->getthemefolder($params); // selecting ulb mapped theme
	   $theme=$themefolder[0]['folder'];
	   $data['theme']=$themefolder[0]['folder'];
	   $themeLayoutId=$themefolder[0]['theme_id'];
	   
	  
	   
	   $params=array('theme_layout_id'=>$themeLayoutId);
	   $layoutwidgets=$this->MenuModel->getLayout_innerpage($params);
	   $layouts=array();
	   foreach($layoutwidgets->result() as $key=>$val)
	   {
	       $layouts[$val->page_layout_id]=$val->page_layout_desc;
	   }
	   
	   
	   
	   $data['layoutwidgets']=$this->Themeonelayoutwidgets->getLayoutwidgets($layouts,$ulbid,$langId=$this->session->userdata('lang_Id'));
	   //print_r($data['layoutwidgets']);
	  
	   $params=array('ulbid'=>$this->session->userdata('ulb_id'),'theme_layout_id'=>$themeLayoutId,'flag'=>1);
	   $data['customepagelayouts']=$this->MenuModel->getLayout($params);
	 
	  
	   
	    $page_content="<div><h3 class='inner_heading'>".$data['content'][0]['page_name']."</h3><br></div>";
	    
	    // text replacing with short codes here
	    
	    
	   
	    $page_content.=str_replace('{municipality}',$data['ulbnameenglish'],$data['content'][0]['content']);
	    $page_content=str_replace('{feedbackform}',$this->Staticpagefunctions->getFeedbackform($ulbid),$page_content);
	    
	  
	   
	     if($data['content'][0]['is_custumlink']=='2')
	    {
	       //echo "yes";
	       
	   $category=$this->MenuModel->category_name($data['content'][0]['page_id']);
	   $page_content.="<div>";
           $page_content.="<hr class='post-hr'>";
            $page_content.="<div class='post-details'> ";
            $page_content.="Published on : <span class='post_ti'>".date('d-m-Y H:i:s',strtotime($data['content'][0]['datetime']))."</span>,"; 
            $page_content.="Posted by : <span class='post_ti'> ".$data['content'][0]['author']." ,</span>";	
            $page_content.="Category : <span class='post_ti'> ".$category['page_name']." </span>	";
            $page_content.="</div>";
            $page_content.="</div>";
	   
	   
	       //$page_content.="<div class='post-details'>Date of publication: ".date('d-m-Y H:i:s',strtotime($data['content'][0]['ts']))." Category : ".$category['page_name']." Updated by: ".$data['content'][0]['author']."</div>"; 
	    }
	   
	   // adding base url to link in content
	  
	   
	   //print_r($data['layoutwidgets'][6]);
	 
	   $i=1;
	   
	   //print_r($data['sidebar_list']);
	   foreach($data['sidebar_list'] as $key=>$val)
	   {
	       
	       if($themeLayoutId==1)
	       { 
    	       if($val['layout_id']=='4')
    	       { 
    	           $data['layout_list'][$i]['content']="<div id='print_divv' style='padding-bottom: 50px;'>".$page_content."</div>";
    	           $data['layout_list'][$i]['code']=$val->code;
    	           $sidebardata.="</div></div>";
    	           foreach($data['layoutwidgets'][9] as $index=>$indexvalue)
            	              {
            	                  $sidebardata.=$indexvalue;
            	              }
    	           
    	           $sidebardata.="<div class='myfooter'>";
    	           foreach($data['layoutwidgets'][6] as $index=>$indexvalue)
            	              {
            	                  $sidebardata.=$indexvalue;
            	              }
            	              $sidebardata.="</div>";
            	              
            	              $data['layout_list'][$i]['content'].=$sidebardata;
    	       }
    	       else
    	       { 
    	           if($val['layout_id']=='1')
            	       {
            	           
            	           // IF ONLY LEFT SIDE BAR FIEST WE ARE ADDING LEFT SIDEBAR HERE AND IN ELSE WEARE ADDING PAGE CONTENT
            	           if($i==1)
            	           {
            	               /** if we have multiple widgets in section 
            	                * we have to add all widget to content 
            	                * */
            	                
            	                //print_r($data['layoutwidgets'][1]);
            	              foreach($data['layoutwidgets'][1] as $index=>$indexvalue)
            	              {
            	                  $sidebardata.=$indexvalue;
            	              }
            	          
            	              
            	               $data['layout_list'][$i]['content']=$sidebardata;;
            	               
            	               $data['layout_list'][$i]['code']=$val['code'];
            	           
            	           
            	           }
            	           else
            	           {
            	               $sidebardata='';
            	              $data['layout_list'][$i]['content']="<div id='print_divv'>".$page_content."</div>"; 
            	              $data['layout_list'][$i]['code']=$val['code'];
            	              $sidebardata.="</div></div>";
            	              foreach($data['layoutwidgets'][9] as $index=>$indexvalue)
            	              {
            	                  $sidebardata.=$indexvalue;
            	              }
    	           
    	                            $sidebardata.="<div class='myfooter'>";
                    	           foreach($data['layoutwidgets'][6] as $index=>$indexvalue)
                            	              {
                            	                  $sidebardata.=$indexvalue;
                            	              }
                            	              $sidebardata.="</div>";
            	              
            	                    $data['layout_list'][$i]['content'].=$sidebardata;
            	              
            	           }
            	           
            	           
            	           
    	                   
            	       }
            	       else if($val['layout_id']=='2')
            	       {
            	          
            	           if($i==1)
            	           {
            	               foreach($data['layoutwidgets'][3] as $index=>$indexvalue)
            	              {
            	                  $sidebardata.=$indexvalue;
            	              }
            	               
            	           $data['layout_list'][$i]['content']=$sidebardata;
            	           $data['layout_list'][$i]['code']=$val['code'];
            	           }
            	           else
            	           {
            	              $data['layout_list'][$i]['content']="<div id='print_divv'>".$page_content."</div>"; 
            	              $data['layout_list'][$i]['code']=$val['code'];
            	           }
            	       }
            	       else if($val['layout_id']=='3')
            	       {
            	           
            	           if($i==1)
            	           {
            	           //$data['layout_list'][$i]['content']=$data['layoutwidgets'][1][0];
            	           $content1="";
            	           foreach($data['layoutwidgets'][1] as $key=>$val2)
            	           {
            	               $content1.=$val2;
            	           }
            	           $data['layout_list'][$i]['content']=$content1;
            	           $data['layout_list'][$i]['code']=$val['code'];
            	           }
            	           else if($i==2)
            	           {
            	              $data['layout_list'][$i]['content']="<div id='print_divv'>".$page_content."</div>"; 
            	              $data['layout_list'][$i]['code']=$val['code'];
            	           }
            	           else
            	           {
            	               
            	          
            	           $content3="";
            	           foreach($data['layoutwidgets'][3] as $key=>$val2)
            	           {
            	               $content3.=$val2;
            	           }
            	           
            	           
            	           $data['layout_list'][$i]['content']=$content3;
            	           $data['layout_list'][$i]['code']=$val['code'];
            	           }
            	       }
    	       }
	       }
	   $i++; }
	   
	   //print_r($data['layout_list']);
	   
	  
	   
	   
	   
	   $params=array('ulbid'=>$ulbid,'theme_layout_id'=>$themeLayoutId);
	   $data['customepagelayouts']=$this->MenuModel->getLayout($params);
	   $data['pagesidebarid']=1;
	   $params=array('ulbid'=>$ulbid,'controller'=>$page);
	   
	   $page_name=$this->MenuModel->getPagename($params);
	   
	   
	   // if pagename not found setting controller name as page name
	   
	   if(count($page_name) <=0)
	   {
	     
	       $page_name['page_name']=str_replace("-"," ",$this->uri->segment(2));
	   }
	   
	   
	   $arr=explode(",",$data['ulbinfo'][0]->title); /// page title here 
	   $title=$arr[0];
	   
	   $data['title']=$page_name['page_name'].", ".$arr[0];
	   $params=array('ulbid'=>$ulbid,'page_id'=>$page_name['page_id']);
	   $breadcrumbs_submenus=$this->MenuModel->getBreadcrumbsSubmenus($params);
	  
	   $breadCrumbcount= count($breadcrumbs_submenus);
	  
	   
	   
	    
	   
	   
	   
       
       //$this->breadcrumbs->add('Spring Tutorial', base_url().'tutorials/spring-tutorials');
       if($page=='search')
       {
           
       }
       else
       {
           //echo $breadCrumbcount;
           for($i=$breadCrumbcount; $i>0; $i--)
           {
              
               
               if($breadcrumbs_submenus[$i]['is_custumlink']=='1')
               {
                   $controller=$breadcrumbs_submenus[$i]['site_controller'];
               }
               else
               {
                  $controller=base_url().$breadcrumbs_submenus[$i]['site_controller']; 
               }
                if($breadcrumbs_submenus[$i]['site_controller']==='' || $breadcrumbs_submenus[$i]['site_controller']==='#')
               {
                   $controller=base_url();
               }
               $target="''";
               if($breadcrumbs_submenus[$i]['is_target_blank']=='2')
               {
                  $target="_blank"; 
               }
               $class="''";
               if($breadcrumbs_submenus[$i]['is_alert']=='1')
               {
                  $class="confirmation"; 
               }
               
              
               
               $this->breadcrumbs->add($breadcrumbs_submenus[$i]['page_name'], $controller,$target,$class);  
           }
           
           
           
       $data['breadcrumbs'] = $this->breadcrumbs->render();
	   
       }
       
	   //echo $data['breadcrumbs'];
       //print_r($data['layout_list']);
       
     
     
		$this->load->view($theme.'/header',$data);
 	//	$this->load->view($theme.'/mainmenu',$data);
 	
 		$this->load->view($theme.'/custompage',$data);
	   
 		//$this->load->view($theme.'/footer');
		$this->load->view($theme.'/footerjs',$data['theme']);
	    
	    
	    
	}
	
	public function ajax_get_captcha(){
	    
	    $captcha_reload=$_POST['captcha_reload'];
	    
	    if($captcha_reload=='Realod'){
	        $digits='4';
	        $i = 0; 
            $pin = ""; 
        while($i < $digits){
           $pin .= mt_rand(0, 9);
         $i++;
    }
    echo  $pin;
	        
	    }
	    
	    
	}
	
	public function add_feedback(){
	    
	     if(isset($_POST['submit']))
        {
                $ulbid=$this->input->post('ulbid');
                $currenturl=$this->input->post('currenturl');
                
                $this->CustomModel->add_feedback_from();
                
              
             
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Feedback Inserted Successfully!!</div>");
               
               // $page=base_url().$ulbid."/feedback";
                redirect($currenturl);
              
            
        }
                
      	}
}
