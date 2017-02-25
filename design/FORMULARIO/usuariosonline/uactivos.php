<? 
// Usuarios activos con PHP sin utilizar bases de datos 

// Tiempo en segundos en que expira la sesión. 
$fin_session = 600; 
$arr = file("usuarios.dat"); 
$contenido = $REMOTE_ADDR.":".time()." "; 
for ( $i = 0 ; $i < sizeof($arr) ; $i++ ) 
{ 
$tmp = explode(":",$arr[$i]); 
if (( $tmp[0] != $REMOTE_ADDR ) && (( time() - $tmp[1] ) < $fin_session )) 
{ 
$contenido .= $REMOTE_ADDR.":".time()." "; 

} 

} 
$fp = fopen("usuarios.dat","w"); 
fputs($fp,$contenido); 
fclose($fp); 
$array = file("usuarios.dat"); 

$USUARIOS_ACTIVOS = count($array); 

// Imprimimos la cantiadad de usuarios activos 

echo "Hay ".$USUARIOS_ACTIVOS." usuarios activos"; 
?>