<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Eventos</title>
		<? include("Look.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				fncSubmit(8);
			});
		</script>
	</head>
	<body>
		<form name="ESForm" id="ESForm"  method="post">
			<input type="hidden" maxlength="5" name="vsPage" id="vsPage"  value="ESMUS">
			<input type="hidden" maxlength="2" name="vsAction" id="vsAction"  value="">
			<div id="FormAlign" class="wrapper" align="center" style="width: 500px;">
				<div class="Rounded">
					<div class="Rounded_tl">
						<div class="Rounded_tr">
							<div class="Rounded_content">
								<div style="margin: 0 10px;">
									<table class="titles01" cellspacing="0" cellpadding="0">
										<tr>
											<td>
												Mantenimiento de usuarios
											</td>
										</tr>
									</table>
									<div class="float_clear"></div>
									<div class="content_100" style="margin-top: 10px;">
										<table>
											<tr>
											<td width="116" class="FldCaption">Persona:</td>
											<td width="352" class="Data">&nbsp;
												<select size="1" id="vsId_persona" name="vsId_persona" >
													<option value="0">Seleccione persona</option>
												</select>
											</td>
											</tr>
											<tr>
												<td class="td_30 FldCaption" width="116">Usuario:</td>
												<td class="tc_70 Data" width="352">
												<p>&nbsp;
													<strong class="input"><em><span><span>
														<input class="text" id="vsUsuario" name="vsUsuario" maxlength="15"  size="15" value='<? echo $_POST["vsUsuario"];?>' placeholder="Ingrese Usuario" autofocus />
													</span></span></em></strong>
													</p>
											</td>
											</tr>
											<tr>
												<td class="td_30 FldCaption" width="116">Pais:</td>
												<td class="tc_70 Data" width="352">
												<p>&nbsp;
													<strong class="input"><em><span><span>
													<select id="vsPais" name="vsPais" size="1" />
														<option value="0">Selecciones Pais</option>
														<option value="1">Guatemala</option>
														<option value="2">Costa Rica</option>
														<option value="3">El Salvador</option>
														<option value="4">Honduras</option>
														<option value="5">Nicaragua</option>
														<option value="6">Panama</option>
														<option value="7">Mexico</option>
													</select>
													</span></span></em></strong>
												</p>
											</td>
											</tr>
											<tr>
												<td class="td_30 FldCaption" width="116">Sucursal:</td>
												<td class="tc_70 Data" width="352">
												<p>&nbsp;
													<strong class="input"><em><span><span>
														<input class="text" id="vsSucursal" name="vsSucursal" maxlength="5"  size="15" value='<? echo $_POST["vsSucursal"];?>' placeholder="Ingrese Sucursal" />
													</span></span></em></strong>
													</p>
											</td>
											<tr>
												<td class="td_30 FldCaption" width="116">Jornada:</td>
												<td class="tc_70 Data" width="352">
												<p>&nbsp;
													<strong class="input"><em><span><span>
														<input class="text" id="vsJornada" name="vsJornada" maxlength="5"  size="15" value='<? echo $_POST["vsJornada"];?>' placeholder="Ingrese Jornada" />
													</span></span></em></strong>
													</p>
											</td>
											</tr>
											<tr>
											<td width="116" class="FldCaption">Rol:</td>
											<td width="352" class="Data">&nbsp;
												<select id="vsRol" name="vsRol" style="font-color:#b0a9a9;"  placeholder="Rol" >
													<option value="0" <? if ($_POST["vsRol"] == "0") echo "Selected" ?>>Seleccione un rol</option>
													<option value="1" <? if ($_POST["vsRol"] == "1") echo "Selected" ?>>Administrador Sistema</option>
													<option value="2" <? if ($_POST["vsRol"] == "2") echo "Selected" ?>>Administrador</option>
													<option value="3" <? if ($_POST["vsRol"] == "3") echo "Selected" ?>>Grupo 1</option>
													<option value="4" <? if ($_POST["vsRol"] == "4") echo "Selected" ?>>Grupo 2</option>
													<option value="5" <? if ($_POST["vsRol"] == "5") echo "Selected" ?>>Grupo 4</option>
													<option value="6" <? if ($_POST["vsRol"] == "5") echo "Selected" ?>>Grupo 5</option>
													<option value="7" <? if ($_POST["vsRol"] == "5") echo "Selected" ?>>Grupo 6</option>
												</select>
											</td>
											</tr>
											<tr>
												<td width="116" class="FldCaption">&nbsp;</td>
												<td width="352" class="Data">&nbsp;</td>
											</tr>
											<table style="margin: 10px 0;" cellpadding="5">
											<tr>
												<td width="412">
													<a href="#" class="button_anchor">
														<input type ="button" class="b02" id="BtnG" onclick="fncSubmit(1);" value="Grabar" />
													</a>
													<a href="#" class="button_anchor">
														<input type ="button" class="b02" id="BtnB" onclick="fncSubmit(2);" value="Buscar" />
													</a>
													<a href="#" class="button_anchor">
														<input type ="button" class="b02" id="BtnE" onclick="fncSubmit(4);" value="Eliminar" />
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<p><label id="Msg" name="Msg"></label></p>	
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
