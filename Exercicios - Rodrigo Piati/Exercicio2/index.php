<html>
 <head>
 <title> Gerenciamento  de e-mails em PHP </title>
 <meta name="description" content="gerenciamento de e-mails em PHP">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 </head>

 <body>

<form action="cadastra.php" method="post">

<fieldset>
 <legend>Cadastrar </legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="nome">Nome: </label>
   </td>
   <td align="left">
    <input type="text" name="nome">
   </td>
  </tr>
  <tr>
   <td>
    <label for="rg">E-mail: </label>
   </td>
   <td align="left">
      <input type="text" name="email" maxlength="50"> 
   </td>
  </tr> 
 </table>
 	<input type="submit">
	<input type="reset" value="Limpar">
 </fieldset>
</form>

<br />

<form action="edita.php" method="post">

<fieldset>
 <legend>Alterar e-mail </legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="editar">E-mail antigo: </label>
   </td>
   <td align="left">
      <input type="text" name="emailBefore" maxlength="50"> 
   </td>
  </tr> 
  <tr>
   <td>
    <label for="editar">Novo e-mail: </label>
   </td>
   <td align="left">
      <input type="text" name="emailAfter" maxlength="50"> 
   </td>
  </tr>
 </table>
 	<input type="submit" value="Editar">
	<input type="reset" value="Limpar">
 </fieldset>
</form>

<br />

<form action="exclui.php" method="post">

<fieldset>
 <legend>Excluir conta </legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="excluir">E-mail: </label>
   </td>
   <td align="left">
      <input type="text" name="email" maxlength="50"> 
   </td>
  </tr> 
 </table>
 	<input type="submit" value="Excluir">
	<input type="reset" value="Limpar">
 </fieldset>
</form>

<fieldset>
<legend>E-mails cadastrados</legend> 
<?php
  include "mostrarCadastrados.php";
?>
</fieldset>
<br>
<strong>@A data e hora sao inseridas automaticamente ao cadastrar ou editar um e-mail.<br/></strong>
<strong>@Para todas as operacoes são gerados arquivos de log. Tentativas de operacoes tambem sao cadastradas nos logs.</strong>
 </body>
 </html>