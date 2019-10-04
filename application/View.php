<?php
class View
{
   
    private $_controlador;
    private $_js;
    private $_css;
    public $uf;

    public $menu;

    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        $this->_js = array();
        $this->_css = array();
        $this->_metodos = $peticion->getMetodo();
        $this->_args = $peticion->getArgs();
   

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://larrainvial.finmarketslive.cl/www/index.html?mercado=chile");
curl_setopt($curl, CURLOPT_POSTFIELDS, "");
curl_setopt($curl, CURLOPT_PORT, '80');

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_HEADER, 'Content-Type: application/html');
curl_setopt($curl, CURLOPT_SSLVERSION, 3); 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
$response   = curl_exec($curl);
$curl_errno = curl_errno($curl);
$array=explode("<th>Indicadores</th>",$response);
$corte=explode('UF',$array[1]);
$corte=explode('+',$corte[1]);
curl_close($curl);

$uf = str_replace('.', '', $corte[0]);
$uf = str_replace("," , ".", $uf);
$uf = str_replace(" ", '', $uf);
$uf = str_replace("</span>", '', $uf);
$uf = str_replace("</td>", '', $uf);
$uf = str_replace("<td>", '', $uf);
$uf = str_replace('<spandata-bind="text:price">', '', $uf);
$uf = str_replace('<spanclass="varpos-var"data-bind="text:performance_pct,style:{color:color,background:background}">', '', $uf);



 
$sin_espacios_en_blanco=trim($uf);
$this->uf = (float) $sin_espacios_en_blanco;




    }
    
    public function renderizar($vista)
    {

        

            
        
        $js = array();
        
        if(count($this->_js)){
            $js = $this->_js;
        }
        $css = array();
        
        if(count($this->_css)){
            $css = $this->_css;
        }
        
        $_layoutParams = array(
            'ruta_css' => BASE_URL .'layout/'. DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL .'layout/'.  DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL  .'layout/'. DEFAULT_LAYOUT . '/js/',
            'menu' => $this->menu,
            'js' => $js,
            'css'=>$css
        );
        
        $rutaView = ROOT . 'site'.DS.'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        
      

        if(is_readable($rutaView)){
            
            include_once ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
         
            include_once $rutaView; 
        
            include ROOT . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else {
            throw new Exception('Error de vista');
        }
    }

    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = BASE_URL . 'site/views/' . $this->_controlador . '/js/' . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }
    public function setCss(array $css)
    {
        if(is_array($css) && count($css)){
            for($i=0; $i < count($css); $i++){
                $this->_css[] = BASE_URL . 'site/views/' . $this->_controlador . '/css/' . $css[$i] . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }
}

?>
