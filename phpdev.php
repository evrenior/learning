 <!-- phpdev.php Проверочный файл PHP, проверка наследования классов и проверка работы mktime(), date(), time(), extract(), explode()  -->
<?php	
	class igor{
		static $otchestvo;
		public $lastname;
		function __construct(){
			$this->lastname = "Жавнерчик\n";
			self::$otchestvo = "Александрович";
		}
		function getLastName(){
			return $this->lastname;
		}
	}
	class denis extends igor{
		public $name;
		function __construct(){
			parent::__construct();
			parent::$otchestvo = "Игоревич";
		}
		
	}
	$denis = new denis();
	echo $denis->getLastName();
	echo $denis::$otchestvo;
	$a = "anna";
	$b = "Denis";
	function annaDen(&$c, &$d){
		$c = "\nman";
		$d = "\ngirl";
	}
	annaDen($a, $b);
	echo $b;
	$age = (String)("\n1");
	$age += 1;
	echo $age; 
	$zhaunerchyk = array("Daughter" => "Hanna",
						 "Son" => "Denis",
						 "Mother" => "Liudmila",
						 "Father" => "Ihar"); 
	foreach($zhaunerchyk as $type => $name){
		echo "\n" . $type. " is ".$name;
	}	
	while(list($type1, $name1) = each($zhaunerchyk)){
		echo "\n".$type1. " - ". $name1;
	}
	$new_string = "Всем привет, меня зовут Денис";
	$new_array = explode(" ", $new_string);
	print_r($new_array);
	extract($new_array, EXTR_PREFIX_ALL, "Den");
	echo $Den_4;
	$new_array1 = compact('Den_0', 'Den_1', 'Den_2','Den_3', 'Den_4');
	print_r( $new_array1);
	$name_den = "Denis";
	printf("%'#99s\n", $name_den);
	echo time() + 7 * 24 * 60 * 60;
	echo mktime(0, 0, 0, 1, 1, 2000);
	echo date("D/M/Y - l - H:i /s L",905334433);
	?>