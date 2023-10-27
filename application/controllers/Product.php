<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
{
    /**
     * Check Valid Login or display login page.
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->login->check_session() == false) {
            redirect(site_url('site/admin'));
        }

        $this->load->library('pagination'); 
        $this->load->model('earning');
        $this->load->library('cart');
        $this->load->model('downline_model');
        $this->load->model('Emart_model');
        $this->load->model('gmlm_model');

        $this->load->helper('file_helper');
    }

    public function index()
    {
        $data['title']      = 'Dashboard';
        $data['breadcrumb'] = 'dashboard';
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function add_product()
    {
        $this->form_validation->set_rules('prod_name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('category', 'Product Category', 'trim|required');
        $this->form_validation->set_rules('prod_price', 'Product Price', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Add Product / Service';
            $data['breadcrumb'] = 'Add Product / Service';
            $data['layout']     = 'product/add_product.php';

            $this->db->select('*')->order_by('cat_name', 'ASC');
            $data['parents'] = $this->db->get('product_categories')->result_array();

            $this->db->select('*')->order_by('brand_name', 'ASC');
            $data['brands'] = $this->db->get('brands')->result_array();

            $this->db->select('*')->order_by('variant_name', 'ASC');
            $data['variant'] = $this->db->get('product_variant')->result_array();

            $this->db->select('*')->order_by('sub_cat_name', 'ASC');
            $data['subcat'] = $this->db->get('product_sub_category')->result_array();

            $this->db->select('id, flag_name')->order_by('flag_name', 'ASC');
            $data['flags'] = $this->db->get('flag')->result_array();

            $this->db->select('*')->where(array('type' =>'Repurchase'))->order_by('id', 'ASC');
            $data['plans'] = $this->db->get('plans')->result_array();



            $this->load->view(config_item('admin_theme'), $data);
        } else {
            $product_cost     = $this->common_model->filter($this->input->post('product_cost'), 'float');
            $prod_name        = $this->input->post('prod_name');
            $plan_id          = $this->input->post('plan_id');
            $discount         = $this->input->post('discount');
            $category         = $this->input->post('category');
            $product_type     = $this->input->post('product_type') ? $this->input->post('product_type') : 'single';
            
            $variant_value[]   = $this->input->post('variant_value');
            //print_r( $variant_value[0]);
            $variant=implode(', ',$variant_value[0]);
            

            $this->db->select('parent_cat_id');
            $this->db->where('cat_id', $category);
            $q = $this->db->get('product_categories');
            $sub_category = $this->input->post('sub_category');            
            $brand        = $this->input->post('brand');
            $prod_price   = $this->common_model->filter($this->input->post('prod_price'), 'float');
            $dealer_price = $this->input->post('dealer_price') != '' ? $this->common_model->filter($this->input->post('dealer_price'), 'float') : $this->common_model->filter($this->input->post('prod_price'), 'float');
            $old_price    = $this->common_model->filter($this->input->post('old_price'), 'float');
            $prod_desc    = $this->input->post('prod_desc');
            $qty          = $this->input->post('qty');
            //$pv         = $this->db_model->select('pv', 'plans', array('id' => $plan_id));
            $pv           = $this->input->post('pv') ? $this->input->post('pv') : 0;
            $gst          = $this->common_model->filter($this->input->post('gst'), 'float');
            $image        = 'default.jpg';
            $pro_name     = $this->db_model->select('prod_name', 'product', array('prod_name' => $prod_name));
            $display_product = $this->input->post('display_product') ? $this->input->post('display_product') : 'Yes';

            if($pro_name){
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Product name already exists!! </div>');
            redirect('product/add_product');
            }

            if (trim($_FILES['image']['name']) !== "") {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_product');
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $image_data['file_name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], FCPATH . 'uploads/products/'.$image);
                    unlink('uploads/'.$image);
                    $image = 'products/'.$image;
                }
            }
            if (trim($_FILES['image2']['name']) !== "") {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image2')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_product');
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image2 = $image_data['file_name'];
                    move_uploaded_file($_FILES['image2']['tmp_name'], FCPATH . 'uploads/products/'.$image2);
                    unlink('uploads/'.$image2);
                    $image2 = 'products/'.$image2;
                }
            }
            if (trim($_FILES['image3']['name']) !== "") {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image3')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_product');
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image3 = $image_data['file_name'];
                    move_uploaded_file($_FILES['image3']['tmp_name'], FCPATH . 'uploads/products/'.$image3);
                    unlink('uploads/'.$image3);
                    $image3 = 'products/'.$image3;
                }
            }
            if (trim($_FILES['image4']['name']) !== "") 
            {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image4')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_product');
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image4 = $image_data['file_name'];
                    move_uploaded_file($_FILES['image4']['tmp_name'], FCPATH . 'uploads/products/'.$image4);
                    debug_log(4);
                    unlink('uploads/'.$image4);
                    $image4 = 'products/'.$image4;
                }
            }
            if (trim($_FILES['image5']['name']) !== "") {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image5')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_product');
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image5 = $image_data['file_name'];
                    move_uploaded_file($_FILES['image5']['tmp_name'], FCPATH . 'uploads/products/'.$image5);
                    unlink('uploads/'.$image5);
                    $image5 = 'products/'.$image5;
                }
            }
            $data = array(
                'prod_name'       => $prod_name,
                'plan_id'         => $plan_id,
                'category'        => $category,
                'prod_price'      => $prod_price,
                'discount'        => $discount,
                'vendor_id'       => 1,
                'dealer_price'    => $dealer_price,
                'product_cost'    => $product_cost,
                'prod_desc'       => $prod_desc,
                'qty'             => $qty,
                'product_type'    => $product_type,
                'variant_name'    => $product_type=='single' ? '':$variant,
                'sub_category'    => $sub_category,
                'parent_category' => $parent_category['0']['parent_cat_id'],
                'gst'             => $gst,
                'brand'           => $brand,
                'image'           => $image,
                'image2'          => $image2,
                'image3'          => $image3,
                'image4'          => $image4,
                'image5'          => $image5,
                'pv'              => $pv,
                'status'          => 'Selling',
                'display_product' => $display_product,
            );
            $this->db->insert('product', $data);
            debug_log($this->db->last_query());
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Product Added Successfully.</div>');
            redirect('product/manage_products');

        }
    }

    public function view($id)
    {
        $product_data = $this->db_model->select_multi('*', 'product', array('id' => $id));

        $data['title']      = 'Product Detail';
        $data['breadcrumb'] = 'Manage Products';
        $data['layout']     = 'product/view_product.php';
        $data['data']       = $product_data;
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('prod_name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('category', 'Product Category', 'trim|required');
        $this->form_validation->set_rules('prod_price', 'Product Price', 'trim|required');
        if ($this->form_validation->run() == false) {
            
            $this->db->select('*')->order_by('cat_name', 'ASC');
            $data['parents'] = $this->db->get('product_categories')->result_array();

            $this->db->select('*')->order_by('brand_name', 'ASC');
            $data['brands'] = $this->db->get('brands')->result_array();

            $this->db->select('*')->order_by('variant_name', 'ASC');
            $data['variant'] = $this->db->get('product_variant')->result_array();

            $this->db->select('*')->order_by('sub_cat_name', 'ASC');
            $data['subcat'] = $this->db->get('product_sub_category')->result_array();

            $this->db->select('brand_id, brand_name')->order_by('brand_name', 'ASC');
            $data['brands'] = $this->db->get('brands')->result_array();

            $this->db->select('*')->where(array('type' =>'Repurchase'))->order_by('id', 'ASC');
            $data['plans'] = $this->db->get('plans')->result_array();

            $data['selected'] = $this->db->query("SELECT t1.*, t2.*, t3.*, t4.* FROM product t1 
                LEFT JOIN 
                (SELECT cat_id, cat_name, parent_cat FROM product_categories) as t2 ON t2.cat_id = t1.category
                LEFT JOIN 
                (SELECT sub_cat_id, sub_cat_name FROM product_sub_category) as t3 ON t3.sub_cat_id = t1.sub_category
                LEFT JOIN 
                (SELECT brand_id, brand_name FROM brands) as t4 ON t4.brand_id = t1.brand
                where t1.id = ".$id)->row();

            $product_data       = $this->db_model->select_multi('*', 'product', array('id' => $id));
            $data['product_name']= $product_data->prod_name;
            $data['title']      = 'Edit Product';
            $data['breadcrumb'] = 'Manage Products';
            $data['layout']     = 'product/edit_product.php';
            $data['data']       = $product_data;

            $this->load->view(config_item('admin_theme'), $data);
        } 
        else
        {
            $prod_old_name= $this->db_model->select('prod_name', 'product', array('id' => $id));
            $product_cost     = $this->common_model->filter($this->input->post('product_cost'), 'float');
            $discount= $this->common_model->filter($this->input->post('discount'), 'float');
            $prod_name        = $this->input->post('prod_name');
            //print_r($prod_name);die();
            $plan_id        = $this->input->post('plan_id');
            $category         = $this->input->post('category');
            $sub_category= $this->input->post('sub_category');            
            $brand        = $this->input->post('brand');
            $prod_price       = $this->common_model->filter($this->input->post('prod_price'), 'float');
            $dealer_price       = $this->input->post('dealer_price') != '' ? $this->common_model->filter($this->input->post('dealer_price'), 'float') : $this->common_model->filter($this->input->post('prod_price'), 'float');
            $old_price       = $this->common_model->filter($this->input->post('old_price'), 'float');
            $prod_desc        = $this->input->post('prod_desc');
            $qty        = $this->input->post('qty');
            $pv        = $this->input->post('pv');
            $gst              = $this->common_model->filter($this->input->post('gst'), 'float');
            $display_product = $this->input->post('display_product') ? $this->input->post('display_product') : 'Yes';
            
            if($this->db_model->select('id','product', array('prod_name'=>$prod_name)) != $this->input->post('id')){
                $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Product name already exists!! </div>');
                redirect('product/edit/'.$id);
            }

            $image = $old_image     = $this->db_model->select('image', 'product', array('id' => $this->input->post('id')));
            $image2 = $old_image2   = $this->db_model->select('image2', 'product', array('id' => $this->input->post('id')));
            $image3 = $old_image3   = $this->db_model->select('image3', 'product', array('id' => $this->input->post('id')));
            $image4 = $old_image4   = $this->db_model->select('image4', 'product', array('id' => $this->input->post('id')));
            $image5 = $old_image5   = $this->db_model->select('image5', 'product', array('id' => $this->input->post('id')));

            if (trim($_FILES['image']['name'] !== "")) {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image1 not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/edit/'.$id);
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $image_data['file_name'];
                    if (trim($image_data['file_name']) !== "") {
                        unlink(FCPATH . '/uploads/products/' . $old_image);
                        move_uploaded_file($_FILES['image']['tmp_name'], FCPATH . 'uploads/products/'.$image);
                        //debug_log(1);
                        unlink('uploads/'.$image);
                        $image = 'products/'.$image;
                    }
                }
            }
            if (trim($_FILES['image2']['name'] !== "")) {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image2')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image2 not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/edit/'.$id);
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image2 = $image_data['file_name'];
                    if (trim($image_data['file_name']) !== "") {
                        unlink(FCPATH . '/uploads/products/' . $old_image2);
                        move_uploaded_file($_FILES['image2']['tmp_name'], FCPATH . 'uploads/products/'.$image2);
                        debug_log(2);
                        unlink('uploads/'.$image2);
                        $image2 = 'products/'.$image2;
                    }
                }
            }
            if (trim($_FILES['image3']['name'] !== "")) {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image3')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image3 not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/edit/'.$id);
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image3 = $image_data['file_name'];
                    if (trim($image_data['file_name']) !== "") {
                        unlink(FCPATH . '/uploads/products/' . $old_image3);
                        move_uploaded_file($_FILES['image3']['tmp_name'], FCPATH . 'uploads/products/'.$image3);
                        debug_log(3);
                        unlink('uploads/'.$image3);
                        $image3 = 'products/'.$image3;
                    }
                }
            }
            if (trim($_FILES['image4']['name'] !== "")) {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image4')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image4 not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/edit/'.$id);
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image4 = $image_data['file_name'];
                    if (trim($image_data['file_name']) !== "") {
                        unlink(FCPATH . '/uploads/products/' . $old_image4);
                        move_uploaded_file($_FILES['image4']['tmp_name'], FCPATH . 'uploads/products/'.$image4);
                        debug_log(4);
                        unlink('uploads/'.$image4);
                        $image4 = 'products/'.$image4;
                    }
                }
            }
            if (trim($_FILES['image5']['name'] !== "")) {

                $this->load->library('upload');

                if (!$this->upload->do_upload('image5')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image5 not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/edit/'.$id);
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image5 = $image_data['file_name'];
                    if (trim($image_data['file_name']) !== "") {
                        unlink(FCPATH . '/uploads/products/' . $old_image5);
                        move_uploaded_file($_FILES['image5']['tmp_name'], FCPATH . 'uploads/products/'.$image5);
                        debug_log(5);
                        unlink('uploads/'.$image5);
                        $image5 = 'products/'.$image5;
                    }
                }
            }
            $data = array(
                'prod_name'       => $prod_name,
                'plan_id'         => $plan_id,
                'category'        => $category,
                'vendor_id'       => 1,
                'prod_price'      => $prod_price,
                'dealer_price'    => $dealer_price,
                'product_cost'    => $product_cost,
                'prod_desc'       => $prod_desc,
                'qty'             => $qty,
                'discount'       =>  $discount,
                'sub_category'    => $sub_category,
                'gst'             => $gst,
                'brand'           => $brand,
                'image'           => $image,
                'image2'           => $image2,
                'image3'           => $image3,
                'image4'           => $image4,
                'image5'           => $image5,
                'pv'               => $pv,
                'status'          => 'Selling',
                'display_product' => $display_product,

            );
            
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('product', $data);
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Product Updated successfully.</div>');
            redirect('product/manage_products');
        }
    }

    public function remove($id)
    {
        $count = $this->db_model->count_all('product_sale', array(
            'product_id' => $id,
            'status'     => 'Processing',
        ));
        if ($count > 0) {
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Product Cannot be deleted as there are ' . $count . ' Un-Delivered Orders.</div>');
            redirect('product/manage_products');
        } else {
            $img = $this->db_model->select('image', 'product', array('id' => $id));
            $this->db->where('id', $id);
            $this->db->delete('product');
            if($img != 'default.jpg')
            {
                unlink(FCPATH . '/uploads/products/' . $img);
            }
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Product Deleted successfully.</div>');

            redirect('product/manage_products');
        }
    }

    public function remove_variant($id)
    {
       $variant_name=$this->db_model->select('variant_name', 'product_variant', array('id' => $id));
      $result= $this->db->query("SELECT * FROM `product` WHERE `variant_name` like '%$variant_name%'");
      $product_detail=$result->result();
      //print_r($product_detail);die();
        if ($product_detail) {
            $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Product Variant Cannot be deleted as there are ' . $count . ' Products.</div>');
            redirect('product/manage_variation');
        } else {
            
            $this->db->where('id', $id);
            $this->db->delete('product_variant');
            
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Product variant Deleted successfully.</div>');

            redirect('product/manage_variation');
        }
    }

    public function search_product()
    {
        $data['title']      = 'Search Product';
        $data['breadcrumb'] = 'Search Product';
        $data['layout']     = 'product/search_product.php';
        $this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
        $data['parents'] = $this->db->get('product_categories')->result_array();
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function export_product_details()
    {
        if(isset($_POST["export_product_details"]))
        {
            $filename = 'Product_details_'.date('Y-m-d').'.csv'; 
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-Type: application/csv; ");

            // get data 

            /*$this->db->select('t1.id, t3.tax_no, t1.amount, t1.tax_amount, t1.tax_percnt, t1.date,t1.transaction_id')
                    ->order_by('t1.id', 'desc')
                    ->from('tax_report as t1')
                    ->where('t1.transaction_id !=' ,'')
                    ->join('member as t2', 't1.userid = t2.id', 'LEFT')
                    ->join('member_profile as t3', 't1.userid = t3.userid', 'LEFT');
            $data = $this->db->get()->result_array();*/
            $data=array(array("",'','','','','','','',''));
            
            //$data=array('','',$this->session->vendor_id,'','','','','','','','');
           
          
            // file creation 
            $file = fopen('php://output', 'w');

            $header = array('prod_name','plan_id','prod_price','discount','gst','prod_desc','brand','parent_category','category','sub_category','qty'); 
            fputcsv($file, $header);
            
            foreach ($data as $key=>$line){ 
                fputcsv($file,$line); 
            }
            fclose($file); 
            exit; 
        }
    }

    public function import()
    {

        $data = array();
        $memData = array();
        
        // If import request is submitted
        if($this->input->post('importSubmit')){
            // Form field validation rules

            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);

                    
                    // Insert/update CSV data into database
                    if(!empty($csvData))
                    {
                     foreach($csvData as $row)
                     { 
                       $rowCount++;
                       // Prepare data for DB insertion
                       //& $row['shipping_charge'] && $row['shipping_tax']
                       if($row['prod_name'] && $row['plan_id']  && $row['parent_category']  && $row['prod_price'] && $row['discount'] && $row['gst'] && $row['prod_desc'] &&  $row['category'] && $row['sub_category'] && $row['qty'] )
                       {
                         $this->db->select('parent_cat_id')->where(array('parent_cat_name' => $row['parent_category']));
                         $parent_cat_id=$this->db->get('product_parent_category')->result_array();

                         $this->db->select('cat_id')->where(array('cat_name' => $row['category']));
                         $category_id=$this->db->get('product_categories')->result_array();
                         $this->db->select('sub_cat_id')->where(array('sub_cat_name' => $row['sub_category']));
                         $sub_cat_id=$this->db->get('product_sub_category')->result_array();
                          if($category_id && $sub_cat_id)
                         {
                            $memData = array(
                                'prod_name' => $row['prod_name'],
                                'plan_id' => $row['plan_id'],
                                'vendor_id' => "0",
                                'prod_price' => $row['prod_price'],
                                'discount'    =>  $row['discount'],
                                'gst' => $row['gst'],
                                'parent_category' =>$parent_cat_id['0']['parent_cat_id'],
                                'prod_desc' => $row['prod_desc'],
                                'category' => $category_id['0']['cat_id'],
                                'sub_category' => $sub_cat_id['0']['sub_cat_id'],
                                'qty' => $row['qty'],
                            );

                           $this->db->insert('product',$memData);
                           //check whether if the product name is already present in the product table
                          /*$product_name= $this->db_model->select('prod_name', 'product', array('prod_name' => $row['prod_name']));
                          if($product_name=="")
                          {
                            $this->db->insert('product',$memData);
                          }*/
                         }
                         else{
                          $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Incorrect Category or subcategory</div>');
                           redirect('product/add_product');
                         }
                        }
                        else
                        {
                          $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Headers donot match/Incorrect Category or subcategory</div>');
                           redirect('product/add_product');
                        }
                      }
                     $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Products Added Successfully.</div>');
                     redirect('product/add_product');
                     // Status message with imported data count
                     $notAddCount = ($rowCount - ($insertCount + $updateCount));
                     $successMsg = 'Product imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                     $this->session->set_userdata('success_msg', $successMsg);
                    }
                    else{
                     $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Your CSV File is empty!.</div>');
                      redirect('product/add_product');
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                    redirect('product/add_product');
                }
            }else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
                redirect('product/add_product');
            }
        }
        //redirect('vendor');
        
    }

       /*
     * Callback function to check file value and type during validation
     */
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }

    public function manage_products()
    {
        $data['title']      = 'View / Edit Products';
        $data['breadcrumb'] = 'View / Edit Products';
        $data['layout']     = 'product/manage_products.php';
        $this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
        $data['parents'] = $this->db->get('product_categories')->result_array();
        $this->db->select('*')->order_by('prod_name', 'ASC');
        $data['prod'] = $this->db->get('product')->result_array();
        $this->load->view(config_item('admin_theme'), $data);

    }

     public function manage_variation()
    {
        $data['title']      = 'View / Edit Variation';
        $data['breadcrumb'] = 'View / Edit Variation';
        $data['layout']     = 'product/manage_variant.php';
        $this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
        $data['parents'] = $this->db->get('product_categories')->result_array();
        $this->db->select('*')->order_by('variant_name', 'ASC');
        $data['prod_variant'] = $this->db->get('product_variant')->result_array();
        $this->load->view(config_item('admin_theme'), $data);

    }
    public function add_brand()
    {
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Add / Edit Brands';
            $data['layout']     = 'product/add_brand.php';
            $data['breadcrumb'] = 'Add / Edit Brands';
            $this->db->select('brand_id, brand_name,brand_image');
            $data['brand'] = $this->db->get('brands')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        }
        else {
            $brand_name        = $this->input->post('brand_name');
            $image            = 'default.jpg';
            if (trim($_FILES['img']['name']) !== "") {

                $this->load->library('upload');

                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_brand');
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $image_data['file_name'];
                }
            }

                $data = array(
                       'brand_name'       => $brand_name,
                       //'brand_description'=> $description,
                       'brand_image'           => $image,
                );
                $this->db->insert('brands', $data);
                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Brand Added Successfully.</div>');
                redirect('product/add_brand');
            }
    }
     public function add_variation()
    {
        $this->form_validation->set_rules('variant_name', 'Variation Name', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Add / Edit Variation';
            $data['layout']     = 'product/add_variant.php';
            $data['breadcrumb'] = 'Add / Edit Variation';
            $this->db->select('id, variant_name,variant_value');
            $data['variant'] = $this->db->get('product_variant')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        }
        else {
            
            $variant_value[]   = $this->input->post('variant_value');

            $variant=implode(', ',$variant_value[0]);
            $variant_array= array();
            /*foreach($variant_value[0] as $key=>$v){
              array_push($variant_array,array($v=>$variant_value[0][$key]));
            }
            $variant_values  = serialize($variant_array);*/
            //print_r($variant_values);die();
            $data = array(
                       'variant_name'  => $this->input->post('variant_name'),
                       'variant_value' =>  $variant,
                );
                $this->db->insert('product_variant', $data);
                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Variant Added Successfully.</div>');
                redirect('product/add_variation');
            }
    }

     public function add_image_banner()
    {   
        $this->form_validation->set_rules('banner_name', 'Banner Name', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Add Banner/Images';
            $data['breadcrumb'] = 'Add Banner/Images';
            $data['layout']     = 'product/add_image_banner.php';

            $this->db->select('id, prod_name')->order_by('prod_name', 'ASC');            
            $data['products'] = $this->db->get('product')->result_array();

            $this->db->select('id, flag_name, flag_dimension')->where('v2',1)->order_by('id', 'ASC');
            $data['flags'] = $this->db->get('flag')->result_array();
            $this->load->view(config_item('admin_theme'), $data);
        } else {
            
            $banner_name = $this->input->post('banner_name');
            $prod_id        = $this->input->post('prod_id');
            $banner_desc = $this->input->post('banner_desc');
            $flag = $this->input->post('flag');

            if (trim($_FILES['img']['name']) !== "") {

                $this->load->library('upload');

                if (!$this->upload->do_upload('img')) {
                    $this->session->set_flashdata('common_flash', '<div class="alert alert-danger">Image not uploaded. Also select category.<br/>' . $this->upload->display_errors() . '</div>');
                    redirect('product/add_image_banner');
                } else {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = true;
                    $config['width']          = 600;
                    $config['height']         = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $image = $image_data['file_name'];
                    move_uploaded_file($_FILES['img']['tmp_name'], FCPATH . 'uploads/products/'.$image);
                    unlink('uploads/'.$image_data['file_name']);
                    $image = 'products/'.$image;
                }

                $data = array(
                    'banner_name'     =>$banner_name,
                    'prod_id'          => $prod_id,
                    'banner_desc'      => $banner_desc,
                    'image'           => $image,
                    'flag'            => $flag,
                );
                $this->db->insert('store_images', $data);
                $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Image/Banner Added Successfully.</div>');
                redirect('product/manage_banners');
            
            }
        }
    }

    public function manage_banners()
    {
        
        $data['title']      = 'Banner Details';
        $data['breadcrumb'] = 'Manage Banners';
        $data['layout']     = 'product/manage_banners.php';

        $this->db->select('id, banner_name, prod_id, flag')->order_by('id', 'ASC');
        $data['data']       = $this->db->get('store_images')->result_array();
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function view_banner($id)
    {  
        //$product_data = $this->db_model->select_multi('*', 'product', array('id' => $id));
        $product_data = $this->db_model->select_multi('*', 'store_images', array('id' => $id));

        $data['title']      = 'Banner Details';
        $data['breadcrumb'] = 'Manage Banners';
        $data['layout']     = 'product/view_banners.php';
        $data['data']       = $product_data;
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function remove_banner($id)
    {
        $img = $this->db_model->select('image', 'store_images', array('id' => $id));
        $this->db->where('id', $id);
        $this->db->delete('store_images');
        unlink(FCPATH . '/uploads/products/' . $img);
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Product Deleted successfully.</div>');

        redirect('product/manage_banners');
    }

    public function search()
    {
        $category   = $this->input->post('category');
        //print_r($category);die();
        $pname      = $this->input->post('pname');
        $status     = $this->input->post('status');
        $display_product = $this->input->post('display_product');

        $this->db->select('id, prod_name,category, prod_price, gst, image, qty, sold_qty, display_product')
            ->order_by('prod_name', 'ASC');
        if ($category !== "All") {
            $this->db->where('category', $category);
        }
        if (trim($pname) !== "") {
            $this->db->like('prod_name', $pname);
        }
        if ($status !== "All") {
            $this->db->where('status', $status);
        }
        if ($display_product !== "All") {
            $this->db->where('display_product', $display_product);
        }
        $data['prod']       = $this->db->get('product')->result_array();
        $data['title']      = 'Search Results';
        $data['breadcrumb'] = 'Search Products';
        $data['layout']     = 'product/manage_products.php';
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function pending_orders()
    {
        $config['base_url']   = site_url('product/pending-orders');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('product_sale', array('status' => 'Processing'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['title']      = 'Pending Orders';
        $data['breadcrumb'] = 'Pending Orders';
        $data['layout']     = 'product/orders.php';
        $this->db->where('status', 'Processing')->order_by('date', 'ASC')->limit($config['per_page'], $page);
        $data['orders'] = $this->db->get('product_sale')->result();
        //print_r($data['orders']);die();
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function delivered()
    {
        $config['base_url']   = site_url('product/delivered');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('product_sale', array('status' => 'Delivered'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['title']      = 'Delivered Orders';
        $data['breadcrumb'] = 'Delivered Orders';
        $data['layout']     = 'product/delivered.php';
        if(config_item('ecomm_theme')=='gmart')
        {
            $data['layout']     = 'product/delivered_gmart.php';
            $this->db->where(array('pro_order_status'=> '4', 'user_id !='=>'0'))->limit($config['per_page'], $page);
            $data['orders'] = $this->db->get('tbl_order_items')->result();
            //print_r($data['orders']);exit();
        }
        else
        {
            $data['layout']     = 'product/delivered.php';
          $this->db->where('status', 'Delivered')->order_by('date', 'ASC')->limit($config['per_page'], $page);
          $data['orders'] = $this->db->get('product_sale')->result();
        }
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function completed_orders()
    {

        $config['base_url']   = site_url('product/completed-orders');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('product_sale', array('status' => 'Completed'));
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['title']      = 'Completed Orders';
        $data['breadcrumb'] = 'Completed Orders';
        $data['layout']     = 'product/completed_orders.php';
        $this->db->where('status', 'Completed')->order_by('id', 'DESC')->limit($config['per_page'], $page);
        $data['orders'] = $this->db->get('product_sale')->result();
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function all_orders()
    {

        $config['base_url']   = site_url('product/all-orders');
        $config['per_page']   = 500000;
        $config['total_rows'] = $this->db_model->count_all('product_sale');
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['title']      = 'All Orders';
        $data['breadcrumb'] = 'List All Orders';
        $data['layout']     = 'product/all_orders.php';
        $this->db->order_by('date', 'ASC')->limit($config['per_page'], $page);
        $data['orders'] = $this->db->get('product_sale')->result();
        $this->load->view(config_item('admin_theme'), $data);
    }

    public function view_order($id)
    {

        $data['layout'] = 'product/view_order.php';
        $data['orders'] = $this->db_model->select_multi('*', 'product_sale', array('id' => $id));
        $this->load->view(config_item('admin_theme'), $data);
    }


    public function shipped()
    {
        $orderid = $this->input->post('shippedid');
        $tdetail = $this->input->post('sdetail');

        debug_log('$orderid ' . $orderid . ' $tdetail ' . $tdetail);

        $before_tid = $this->db_model->select('tid', 'product_sale', array('id' => $orderid));

        if($before_tid != '')
        {
            $after_tid = $before_tid . "<br/><br/>" .  date('Y-m-d') . "<br/>Shipping Updates:<br/>" . $tdetail; 
        } else {
            $after_tid = date('Y-m-d') . "<br/> Shipping Updates:<br/>" . $tdetail; 
        }
        
        $data = array(
            'tid'          => $after_tid,
        );
        $this->db->where('id', $orderid);
        $this->db->update('product_sale', $data);

        debug_log($this->db->last_query());

        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Shipping Details Updated successfully.</div>');
        redirect('product/pending_orders');


    }

    public function mark_delivered()
    {
        $orderid = $this->input->post('mark_deliverid');
        $tdetail = $this->input->post('sdetail');
        debug_log('$orderid ' . $orderid . ' $tdetail ' . $tdetail);

        $before_tid = $this->db_model->select('tid', 'product_sale', array('id' => $orderid));

        if($before_tid != '')
        {
            $after_tid = $before_tid . "<br/><br/>" .  date('Y-m-d') . "<br/> Delivery Notes:<br/>" . $tdetail; 
        } else {
            $after_tid = date('Y-m-d') . "<br/> Delivery Notes:<br/>" . $tdetail; 
        }
        
        $data = array(
            'status'       => 'Delivered',
            'tid'          => $after_tid,
        );
        $this->db->where('id', $orderid);
        $this->db->update('product_sale', $data);
        
        //debug_log($this->db->last_query());
        
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Order successfully marked as Delivered.</div>');
        redirect('product/pending_orders');
    }


    public function deliver()
    {
        $orderid = $this->input->post('deliverid');
        $tdetail = $this->input->post('tdetail');

        $this->Emart_model->deliver($orderid,$tdetail);



        $od  = $this->db_model->select_multi('*', 'product_sale', array('id' => $orderid));
        $md = $this->db_model->select_multi('*', 'member', array('id' => $od->userid));
        
        if (config_item('enable_based_pv')=='Yes')
        {
            $this->gmlm_model->update_first_pair_limit($md);
            $this->gmlm_model->get_current_package($md);
        }



        ########## END ENTRY #######################################
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Order Marked as Delivered successfully.</div>');
        redirect('product/pending_orders');
    }  

    public function deliver_gmart(){

            $orderid = $this->input->post('deliverid');
            //print_r($orderid);exit();
            $tdetail = $this->input->post('tdetail');
            if(config_item('ecomm_theme')=='gmart')
            {
              $before_tid = $this->db_model->select('tid', 'tbl_order_items', array('id' => $orderid));
            }
            else
            {
              $before_tid = $this->db_model->select('tid', 'product_sale', array('id' => $orderid));
            }
            if($before_tid != '')
            {
                $after_tid = $before_tid . "<br/><br/>" .  date('Y-m-d') . "<br/> Notes:<br/>" . $tdetail;
            } else {
                $after_tid = date('Y-m-d') . "<br/> Notes: " . $tdetail;
            }
            if(config_item('ecomm_theme')=='gmart')
            {
                $od  = $this->db_model->select_multi('*', 'tbl_order_items', array('id' => $orderid));
               $data = array(
                'pro_order_status'       => '6',
                //'deliver_date' => date('Y-m-d H:i:s'),
                'tid'          => $after_tid,
                );
                $this->db->where('id', $orderid);
                $this->db->update('tbl_order_items', $data);
                $data = array(
                'order_status'       => '6',
                //'deliver_date' => date('Y-m-d H:i:s'),
                );
                $this->db->where('id', $od->order_id);
                $this->db->update('tbl_order_details', $data);
                $order_detail  = $this->db_model->select_multi('*', 'tbl_order_items', array('order_id' => $orderid));
                debug_log("Details");
                debug_log($order_detail);
                
                debug_log($od);
                $prd = $this->db_model->select_multi('*', 'tbl_product', array('id' => $od->product_id));
                debug_log($prd);
                $md = $this->db_model->select_multi('*', 'member', array('id' => $od->user_id));
                $user_details= $this->db_model->select_multi('*', 'tbl_users', array('affiliate_id' => $od->user_id));

                 $data_arr = array(
                    'order_id' => $od->id,
                    'user_id' => $od->user_id,
                    'product_id' => '0',
                    'status_title' => '6',
                    'status_desc' => 'Your Order is Completed',
                    'created_at' => strtotime(date('Y-m-d H:i:s'))
                );
                //$data_usr = $this->security->xss_clean($data_arr);
                $this->db->insert('tbl_order_status',$data_arr);
                debug_log($md);
                debug_log('deliver_user'.$od->user_id);
                //print_r("hello isndie config_item");
                //print_r($od->user_id);

                // $md_data = array(
                //     'status' =>'Active', 
                // );
                // $this->db->where('id', $md->id);


                //     if($md->mypv >= 50) {
                //             $this->db->update('member', $md_data);
                //        }
                /*$memberData = $this->db_model->select_multi('*', 'member', array('status'=>'Active','id'=>$od->user_id));
                $planData = $this->db_model->select_multi('*', 'plans', array('type' =>'Registration'));
                $this->plan_model->insert_binary_data($memberData, $planData);*/
                $this->earning->credit_binary_commission_all();
                $this->earning->payout(array());
            }
            else
            {
                $data = array(
                'status'       => 'Completed',
                'deliver_date' => date('Y-m-d H:i:s'),
                'tid'          => $after_tid,
                );
                $this->db->where('id', $orderid);
                $this->db->update('product_sale', $data);
                $od  = $this->db_model->select_multi('*', 'product_sale', array('id' => $orderid));
                $prd = $this->db_model->select_multi('*', 'product', array('id' => $od->product_id));
                $md = $this->db_model->select_multi('*', 'member', array('id' => $od->user_id));
            }
            $pd = $od->product_id == 0 ? $this->db_model->select_multi('*', 'plans', array('id' => $md->signup_package)) : $this->db_model->select_multi('*', 'plans', array('id' => $prd->plan_id));
            $pd_joining=$this->db_model->select_multi('*', 'plans', array('id' => $md->signup_package));
            //print_r($pd);exit();
            if($od->product_id == 0)
            {
                $status = $this->earning->credit_joining_commission($pd_joining,$md);
            }
            else
            {
                if(config_item('ecomm_theme')=='gmart')
                {
                    $array=array('total_sale' => ($prd->total_sale + $od->product_qty));
                  $this->db->where('id', $od->product_id);
                  $this->db->update('tbl_product', $array);
                }
                else
                {
                  $array = array('sold_qty' => ($prd->sold_qty + $od->qty));
                  $this->db->where('id', $od->product_id);
                  $this->db->update('product', $array);
                }
                //$this->earning->credit_product_comm($md,$pd,$prd,$od,'Repurchase Commission');
                //$this->downline_model->update_downline_pv($od->userid,$prd->pv*$od->qty,$md->role);
                $this->earning->credit_product_comm_gmart($md,$pd,$prd,$od,'Repurchase Commission');

                
                
                debug_log($this->db->last_query());
               
                //$this->earning->credit_product_comm($md,$pd,$prd,$od,'Repurchase Commission');
                  $this->downline_model->update_legs(array());
                  $this->earning->target_reach_income();
                  $this->earning->reward_process();
                  $this->earning->rank_process();
                  $this->earning->payout(array());
            }
            ########## END ENTRY #######################################
            $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Order Marked as Completed successfully.</div>');
            redirect('product/delivered');
    }  

    public function remove_order($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product_sale');
        $this->session->set_flashdata('common_flash', '<div class="alert alert-success">Order Deleted successfully.</div>');
        redirect('product/all_orders');
    }

    public function print_order($id){

        $sales = $this->db_model->select_multi('*', 'product_sale', array('id' => $id));
        $data['sales'] = $sales;
        $data['result'] = $this->db_model->select_multi('*', 'invoice', array('order_id' => $id));
        $this->load->view('admin/product/print_address.php', $data);


    }


}
