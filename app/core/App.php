<?php

class App {

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = []; // kemungkinana parameter lebih dari satu dan dibuat array kosong sebgai default kosong
    //sekarang punya controller dan method default

    
    public function __construct() {

        $url = $this->parseURL(); //berisi apapun yang kita ketikkan di url
        //kenapa $url[0] . '.php'? krn elemen array yg terbentuk dari url index pertama setelah public/
        
        if($url == NULL)
        {
		    $url = [$this->controller];
		}
        if(file_exists('../app/controllers/'. $url[0] . '.php'))
		{
			$this->controller = $url[0];
            unset($url[0]);
        }
        
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if(isset($url[1]) ) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if( !empty($url)) {
            $this->params = array_values($url);
            // var_dump($url);
        }
        //jalankan controller dan method serta kirimkan param jika ada
        call_user_func_array([$this->controller, $this->method],$this->params);
    }

    public function parseURL() {

        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //menghilangkan slash di akhir string
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url); //memecah url setiap setelah slash (delimiter)
            return $url;
        }
    }
}