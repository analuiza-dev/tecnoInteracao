 <?php  
    $arquivo_temp = $_FILES["pdf"]["tmp_name"];
    $nome_arquivo =  $_FILES["pdf"]["name"];
    $arquivo = isset($_FILES["pdf"]) ? $_FILES["pdf"] : FALSE;

   if($arquivo)
   {  
      $fp = fopen($arquivo_temp,"rb");
      $dados_documento = fread($fp,filesize($arquivo_temp));
      fclose($fp); 
      $dados = bin2hex($dados_documento);                       
      
      $sql = "INSERT INTO documentos (nome_documento, tamanho_documento, dados_documento) ".
         "VALUES ('$nome_arquivo', '$tamanho_documento', '$dados')");
 
      mysql_select_db($database, $con);
      $result = mysql_query($sql, $con) or die(mysql_error())
   }
    
    ?>
