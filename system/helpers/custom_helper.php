<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('parse_parameters'))
{
   function parse_parameters($value) {
      $CI = &get_instance();
      $c = $value == 'verified' ? $CI->session->set_userdata(array('lead_email_status'=>'verified')):'';
    }
}

if(!function_exists('footer_note'))
{
   function footer_note($color='#ffc107') {
      $CI = &get_instance();
      if($CI->db->query("select description from settings where type = 'footer'")->result()[0]->description != 1)
      {
        if(config_item('footer_name') != '')
        { 
              $footer  = "&copy;".date('Y')." All Rights Reserved by ".config_item('footer_name');
        } 
        else
        {
          $footer  = "&copy;".date('Y')." All Rights Reserved | Powered by <a href='https://www.globalmlmsolution.com' alt='_blank' style='color: ".$color.";'> Global MLM Software </a>";
        }
      } 
      else 
      {
        if(config_item('footer_name') != '')
        { 
              $footer  = "&copy;".date('Y')." All Rights Reserved by ".config_item('footer_name');
        } 
        else
        {
          $footer  = "&copy;".date('Y')." All Rights Reserved | Powered by <a href='https://www.globalmlmsolution.com' alt='_blank' style='color: ".$color.";'> Global MLM Software </a>";
        }
      }

      return $footer;

    }
}

if(!function_exists('get_logo'))
{
   function get_logo() {
      
      $data['sm_light_logo'] = file_exists(FCPATH ."axxets/client/logo-light.png") ? base_url().'axxets/client/logo-light.png' : base_url().'uploads/site_img/logo-light.png';
      $data['sm_dark_logo'] = file_exists(FCPATH ."axxets/client/logo-dark.png") ? base_url().'axxets/client/logo-dark.png' : base_url().'uploads/site_img/logo-dark.png';
      $data['lg_light_logo'] = file_exists(FCPATH ."axxets/client/logo_light.png") ? base_url().'axxets/client/logo_light.png' : base_url().'uploads/site_img/logo-light-text.png';
      $data['lg_dark_logo'] = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';
      $data['favicon'] = file_exists(FCPATH .'axxets/client/favicon.ico') ? base_url().'axxets/client/favicon.ico' : base_url().'uploads/site_img/favicon.ico';

      return $data;

    }
}



if(!function_exists('debug_log'))
{
   function debug_log($data) {
       if (config_item('debug_mode')) {

            if(strpos(print_r($data, true), '[dbdriver] => mysqli') == false){
                $fp = fopen('.debug.log', 'a');        
                fwrite($fp, date('Y-m-d H:i:s') . ": " . print_r($data, true) . "\n");
                fclose($fp);
            }

            if(filesize('.debug.log')/1024 > 50){

                file_put_contents('.debug_repo.log', file_get_contents('.debug.log'), FILE_APPEND | LOCK_EX);

                $fh = fopen('.debug.log', 'w' );
                fclose($fh);
            }
        }
    }
}

if(!function_exists('wallet_log'))
{
   function wallet_log($data) {

            if(strpos(print_r($data, true), '[dbdriver] => mysqli') == false){
                $fp = fopen('.wallet.log', 'a');        
                fwrite($fp, date('Y-m-d H:i:s') . ": " . print_r($data, true) . "\n");
                fclose($fp);
            }

    }
}

if(!function_exists('screen_log'))
{
   function screen_log($data) {

        echo "<pre>";
          print_r($data);
       echo "</pre>";
       echo "****************************************";

    }
}

if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }   
}


function get_email_verify($name, $code)
{
  return "

  <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <style type='text/css'>
            @media screen {
                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 700;
                    src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                }
            }

            /* CLIENT-SPECIFIC STYLES */
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            img {
                -ms-interpolation-mode: bicubic;
            }

            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }

            table {
                border-collapse: collapse !important;
            }

            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* MOBILE STYLES */
            @media screen and (max-width:600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }

            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>

    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
        <!-- HIDDEN PREHEADER TEXT -->
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <!-- LOGO -->
            <tr>
                <td bgcolor='#FFA73B' align='center'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#FFA73B' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                      <td bgcolor='#ffffff' align='center' valign='top' style='padding: 20px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                          <img src='https://www.globalmlmsolution.com/wp-content/uploads/2020/09/global-mlm-software-logo.png' width='200' height='75' style='display: block; border: 0px;'/>
                      </td>
                    </tr>
                        <tr style='display:none;'> 
                            <td bgcolor='#ffffff' align='center' valign='top' style='padding: 20px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                <h1 style='font-size: 48px; font-weight: 400; margin: 2;'></h1> <img src='https://img.icons8.com/clouds/100/000000/handshake.png' width='125' height='120' style='display: block; border: 0px;' />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <br>
            <tr>
                <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 0;'><br><br>Dear ".$name.", <br><br>Thanks for your interest with <a href='https://globalmlmsolution.com' target='_blank' style='color: blue;'>Global MLM Software - #1 Network Marketing Software</a>.<br><br>Please enter below OTP to confirm your email !!!</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#ffffff' align='left'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                    <tr>
                                        <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                            <table border='0' cellspacing='0' cellpadding='0'>
                                                <tr>
                                                    <td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='javascript:void(0)' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;'>".$code."</a></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr> <!-- COPY -->
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 0;'>If you have any questions, just reply to this email—we're always happy to help out.</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 0;'>Cheers,<br>Global MLM Software Team</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                                <p style='margin: 0;'><a href='https://globalmlmsolution.com' target='_blank' style='color: #FFA73B;'>We&rsquo;re here to help you out</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr style='display:none;'>
                <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'> <br>
                                <p style='margin: 0;'>If these emails get annoying, please feel free to <a href='#' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>

    </html>
  ";

}

function get_welcome_email($name)
{
    
    return "

  <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <style type='text/css'>
            @media screen {
                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 700;
                    src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                }
            }

            /* CLIENT-SPECIFIC STYLES */
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            img {
                -ms-interpolation-mode: bicubic;
            }

            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }

            table {
                border-collapse: collapse !important;
            }

            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* MOBILE STYLES */
            @media screen and (max-width:600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }

            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>

    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
        <!-- HIDDEN PREHEADER TEXT -->
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <!-- LOGO -->
            <tr>
                <td bgcolor='#FFA73B' align='center'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#FFA73B' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                      <td bgcolor='#ffffff' align='center' valign='top' style='padding: 20px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                          <img src='https://www.globalmlmsolution.com/public/img/gmlm_dark_logo_trans-sm.png' width='250' height='75' style='display: block; border: 0px;'/>
                      </td>
                      </tr>
                        <tr>
                            <td bgcolor='#ffffff' align='center' valign='top' style='padding: 20px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>".$name." Welcome!</h1> <img src='https://img.icons8.com/clouds/100/000000/handshake.png' width='125' height='120' style='display: block; border: 0px;' />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <br>
            <br>
            <tr>
                <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 0;'>
                                    <br>
                                    Hello ".$name.", 
                                    <br>
                                    <br>
                                    Thanks for your interest with <a href='https://globalmlmsolution.com' target='_blank' style='color: blue;'>Global MLM Software - #1 Network Marketing Software</a>
                                    <br>
                                    <br>
                                    We are the leading Network Marketing Software provider across the Globe
                                    <br>
                                    <br>
                                    Global MLM is packed with awesome features to take your business to next level. <a href='https://globalmlmsolution.com/mlm-software-features/' target='_blank' style='color: blue;'>Click here Check out 200+ features</a>
                                    <br>
                                    <br>
                                    Do you want to know how we transformed various businesses across the globe. <a href='https://globalmlmsolution.com/video-testimonials/' target='_blank' style='color: blue;'>Click here to watch our customer testimonials</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 0;'>If you have any questions, just reply to this email—we're always happy to help out.</p><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 0;'>Cheers,<br>Global MLM Software Team</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                                <p style='margin: 0;'><a href='https://globalmlmsolution.com' target='_blank' style='color: #FFA73B;'>We&rsquo;re here to help you out</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr style='display:none;'>
                <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'> <br>
                                <p style='margin: 0;'>If these emails get annoying, please feel free to <a href='#' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>

    </html>
  ";
    
    
}




function get_table_email($results, $col_names, $display_names=array(),$header='Report')
{
    
    $output =  "

  <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <style type='text/css'>
            @media screen {
                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 700;
                    src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                }
            }

            /* CLIENT-SPECIFIC STYLES */
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            img {
                -ms-interpolation-mode: bicubic;
            }

            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }

            table {
                border-collapse: collapse !important;
            }

            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* MOBILE STYLES */
            @media screen and (max-width:600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }

            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>

    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
        <!-- HIDDEN PREHEADER TEXT -->
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <!-- LOGO -->
            <tr>
                <td bgcolor='#FFA73B' align='center'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#FFA73B' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                      <td bgcolor='#ffffff' align='center' valign='top' style='padding: 20px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                          <img src='https://www.globalmlmsolution.com/public/img/gmlm_dark_logo_trans-sm.png' width='250' height='75' style='display: block; border: 0px;'/>
                      </td>
                      </tr>
                        <tr>
                            <td bgcolor='#ffffff' align='center' valign='top' style='padding: 20px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>".$header." </h1>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <br>
            <br>
        </table> ";
        
        //Get number of columns
        $col_cnt = count($col_names);

        $display_names = count($display_names) != count($col_names) ? $col_names : $display_names;

        //Setup table - user css class db-table for design
        $output .= "<table class='db-table' style='border-collapse: collapse;'>";
        $output .= "<tr colspan='". $col_cnt ."'>". $tbl_name ."</tr>";
        $output .= "<tr>";

        //Give each table column same name is db column name
        for($i=0;$i<$col_cnt;$i++){
            if($i==0){
                $output .= "<td style='text-align: center;width:40px;'>". $display_names[$i] ."</td>";    
            }else{
                $output .= "<td style='text-align: center;width:300px;'>". $display_names[$i] ."</td>";    
            }
            
        }

        $output .= "</tr>";

        $res_cnt = count($results);
        
        //Print out db table data
        for($i=0;$i<$res_cnt;$i++){
            $output .= "<tr style='border-bottom: 1pt solid black;'>";
            $output .= "<td style='text-align: center;'>". ($res_cnt-$i) ."</td>";
            for($y=1;$y<$col_cnt;$y++){
                if($col_names[$y] == 'dummy_values'){
                    $output .= "<td style='text-align: center;'><a class='btn btn-warning' href='https://api.whatsapp.com/send?phone=".$results[$i][$col_names[$y]]."' target='_blank' type='button'>". $results[$i][$col_names[$y]] ."</a></td>";    
                }else{
                    $output .= "<td style='text-align: center;'>". $results[$i][$col_names[$y]] ."</td>";
                }
            }
            $output .= "</tr>";
        }
        $output .= "</table>";

        $output .= "</body></html>";
        
        return $output;
    
}


function get_lc_details($date){

    //debug_log($date);

    if(($date == '0000-00-00 00:00:00') || ($date =='')){
        return 365;
    }else {
        $now = time(); // or your date as well
        $your_date = strtotime($date)+86400;
        $datediff = $your_date - $now;
        return round($datediff / (60 * 60 * 24));
    }

}






















?>