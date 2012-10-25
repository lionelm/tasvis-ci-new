<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Setting extends MX_Controller
    {   
        function __construct() {
            parent::__construct();                               
            // load session library
            $this->load->library('pagination');                
        }
        
        function index()//General setting
        { 
            
            $site_title = $this->input->post('site_title');
            $site_name = $this->input->post('site_name');
            $site_url = $this->input->post('site_url');
            $template = $this->input->post('template');
            $email_admin = $this->input->post('email_admin');
            $site_description = $this->input->post('site_description');   
                    
            $is_update = 0;
            if ($site_title != '' ) $is_update = 1; 
            if ($site_name != '') $is_update = 1;
            if ($site_url != '') $is_update = 1;
            if ($template != '') $is_update = 1;
            if ($email_admin != '') $is_update = 1;
            if ($site_description != '') $is_update = 1;
           
            if ($is_update == 0 )
            {
                $option = new Option();
                
                $option->where('option_name','site_title')->get();
                $site_title = $option->option_value;
                
                $option->where('option_name','site_name')->get();
                $site_name = $option->option_value;
                
                $option->where('option_name','site_url')->get();
                $site_url = $option->option_value;
                
                $option->where('option_name','template')->get();
                $template = $option->option_value;
                
                $option->where('option_name','email_admin')->get();
                $email_admin = $option->option_value;
                
                $option->where('option_name','site_description')->get();
                $site_description = $option->option_value;
                
            } else
            {                                
                $option = new Option();
                
                if ($option->where('option_name','site_title')->count() > 0 )
                {                   
                    $option->where('option_name','site_title')->update('option_value',$site_title);
                } else
                {                   
                    $option->option_name = 'site_title';
                    $option->option_value = $site_title;
                    $option->save();
                }
                
                                
                $option = new Option();
                
                if ($option->where('option_name','site_name')->count() > 0)
                {
                    $option->where('option_name','site_name')->update('option_value',$site_name);
                    
                } else
                {
                    $option->option_name = 'site_name';
                    $option->option_value = $site_name;
                    $option->save();
                }
                
                $option = new Option();
                
                if ($option->where('option_name','site_url')->count() > 0)
                {
                    $option->where('option_name','site_url')->update('option_value',$site_url);
                } else
                {
                    $option->option_name = 'site_url';
                    $option->option_value = $site_url;
                    $option->save();
                }
                
                $option = new Option();
                
                if ($option->where('option_name','template')->count() > 0)
                {
                    $option->where('option_name','template')->update('option_value',$template);
                } else
                {
                    $option->option_name = 'template';
                    $option->option_value = $template;
                    $option->save();
                }
                
                $option = new Option();
                
                if ($option->where('option_name','email_admin')->count() > 0)
                {
                    $option->where('option_name','email_admin')->update('option_value',$email_admin);
                } else
                {
                    $option->option_name = 'email_admin';
                    $option->option_value = $email_admin;
                    $option->save();
                }
               
                $option = new Option();
                
                if ($option->where('option_name','site_description')->count() > 0)
                {
                    $option->where('option_name','site_description')->update('option_value',$site_description);
                } else
                {
                    $option->option_name = 'site_description';
                    $option->option_value = $site_description;
                    $option->save();
                }
                
            }
            $data['site_title'] =$site_title;
            $data['site_name'] = $site_name;
            $data['site_url'] = $site_url;
            $data['template'] = $template;
            $data['email_admin'] = $email_admin;
            $data['site_description'] = $site_description;            
            $data['view'] = 'option_general';
            $this->load->view('back_end/template_noright',$data);
        } 
        
        function email() 
        { 
            $mail_server = $this->input->post('mail_server');
            $mail_server_name = $this->input->post('mail_server_name');
            $mail_server_host = $this->input->post('mail_server_host');
            $mail_server_username = $this->input->post('mail_server_username');
            $mail_server_password = $this->input->post('mail_server_password'); 
            $mail_server_port = $this->input->post('mail_server_port');          
            $is_update = 0;
            if ($mail_server != '' ) $is_update = 1; 
            if ($mail_server_name != '') $is_update = 1;
            if ($mail_server_host != '') $is_update = 1;
            if ($mail_server_username != '') $is_update = 1;
            if ($mail_server_password != '') $is_update = 1;
            if ($mail_server_port != '') $is_update = 1;
            
            if ($is_update == 0 )
            {
                $option = new Option();
                
                $option->where('option_name','mail_server')->get();
                $mail_server = $option->option_value;
                
                $option->where('option_name','mail_server_name')->get();
                $mail_server_name = $option->option_value;
                
                $option->where('option_name','mail_server_host')->get();
                $mail_server_host = $option->option_value;
                
                $option->where('option_name','mail_server_username')->get();
                $mail_server_username = $option->option_value;
                
                $option->where('option_name','mail_server_password')->get();
                $mail_server_password = 'Password';//$option->option_value;
                
                $option->where('option_name','mail_server_port')->get();
                $mail_server_port = $option->option_value;
                
            } else
            {                                
                $option = new Option();
                
                if ($option->where('option_name','mail_server')->count() > 0 )
                {                   
                    $option->where('option_name','mail_server')->update('option_value',$mail_server);
                } else
                {                   
                    $option->option_name = 'mail_server';
                    $option->option_value = $mail_server;
                    $option->save();
                }
                
                                
                $option = new Option();
                
                if ($option->where('option_name','mail_server_name')->count() > 0)
                {
                    $option->where('option_name','mail_server_name')->update('option_value',$mail_server_name);
                    
                } else
                {
                    $option->option_name = 'mail_server_name';
                    $option->option_value = $mail_server_name;
                    $option->save();
                }
                
                $option = new Option();
                
                if ($option->where('option_name','mail_server_host')->count() > 0)
                {
                    $option->where('option_name','mail_server_host')->update('option_value',$mail_server_host);
                } else
                {
                    $option->option_name = 'mail_server_host';
                    $option->option_value = $mail_server_host;
                    $option->save();
                }
                $option = new Option();
                
                if ($option->where('option_name','mail_server_username')->count() > 0)
                {
                    $option->where('option_name','mail_server_username')->update('option_value',$mail_server_username);
                } else
                {
                    $option->option_name = 'mail_server_username';
                    $option->option_value = $mail_server_username;
                    $option->save();
                }
               
                $option = new Option();
                
                if ($option->where('option_name','mail_server_password')->count() > 0)
                {
                    $option->where('option_name','mail_server_password')->update('option_value',md5($mail_server_password));
                } else
                {
                    $option->option_name = 'mail_server_password';
                    $option->option_value = md5($mail_server_password);
                    $option->save();
                }
                 $option = new Option();
                
                if ($option->where('option_name','mail_server_port')->count() > 0)
                {
                    $option->where('option_name','mail_server_port')->update('option_value',$mail_server_port);
                } else
                {
                    $option->option_name = 'mail_server_port';
                    $option->option_value = $mail_server_port;
                    $option->save();
                }
            }
            $data['mail_server'] =$mail_server;
            $data['mail_server_name'] = $mail_server_name;
            $data['mail_server_host'] = $mail_server_host;
            $data['mail_server_username'] = $mail_server_username;
            $data['mail_server_password'] = 'Password';//$mail_server_password;
            $data['mail_server_port'] = $mail_server_port;
            $data['view'] = 'option_email';
            $this->load->view('back_end/template_noright',$data);
        }
        function seo()
        { 
            $seo_title = $this->input->post('seo_title');
            $seo_description = $this->input->post('seo_description');
            $seo_keyword = $this->input->post('seo_keyword');
                    
            $is_update = 0;
            if ($seo_title != '' ) $is_update = 1; 
            if ($seo_description != '') $is_update = 1;
            if ($seo_keyword != '') $is_update = 1;
            
           
            if ($is_update == 0 )
            {
                $option = new Option();
                
                $option->where('option_name','seo_title')->get();
                $seo_title = $option->option_value;
                
                $option->where('option_name','seo_description')->get();
                $seo_description = $option->option_value;
                
                $option->where('option_name','seo_keyword')->get();
                $seo_keyword = $option->option_value;
                                
                
            } else
            {                                
                $option = new Option();
                
                if ($option->where('option_name','seo_title')->count() > 0 )
                {                   
                    $option->where('option_name','seo_title')->update('option_value',$seo_title);
                } else
                {                   
                    $option->option_name = 'seo_title';
                    $option->option_value = $seo_title;
                    $option->save();
                }
                
                                
                $option = new Option();
                
                if ($option->where('option_name','seo_description')->count() > 0)
                {
                    $option->where('option_name','seo_description')->update('option_value',$seo_description);
                    
                } else
                {
                    $option->option_name = 'seo_description';
                    $option->option_value = $seo_description;
                    $option->save();
                }
                
                $option = new Option();
                
                if ($option->where('option_name','seo_keyword')->count() > 0)
                {
                    $option->where('option_name','seo_keyword')->update('option_value',$seo_keyword);
                } else
                {
                    $option->option_name = 'seo_keyword';
                    $option->option_value = $seo_keyword;
                    $option->save();
                }
               
                
                
            }
            $data['seo_title'] =$seo_title;
            $data['seo_description'] = $seo_description;
            $data['seo_keyword'] = $seo_keyword;
              
            $data['view'] = 'option_seo';
            $this->load->view('back_end/template_noright',$data);
        }   
           
    }
?>
