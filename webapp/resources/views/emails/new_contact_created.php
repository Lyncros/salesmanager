<html>
	<head>
		<title>Nuevo contacto creado</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="sunny.css">
	</head>	
	<body>
	<table id="background-table" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		<tr>
			<td align="center">
				<table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
					<tbody>
					<tr class="large_only">
						<td class="w640" height="20" width="640"></td>
					</tr>
					<tr class="mobile_only">
						<td class="w640" height="10" width="640"></td>
					</tr>
					<tr class="mobile_only">
						<td class="w640" height="10" width="640"></td>
					</tr>
					<tr class="mobile_only">
						<td class="w640" width="640" align="center">
							<img class="mobile_only mobile-logo" border="0" src="{{ $logo['path'] }}" alt="{{ $senderName or '' }}" width="{{ $logo['width'] }}" height="{{ $logo['height'] }}" />
						</td>
					</tr>
					<tr class="mobile_only">
						<td class="w640" height="20" width="640"></td>
					</tr>
					<tr class="large_only">
						<td class="w640"  height="20" width="640"></td>
					</tr>

					<tr>
						<td class="w640" width="640" colspan="3" height="20"></td>
					</tr>

					<tr class="mobile_only">
						<td class="w640"  height="10" width="640" bgcolor="#ffffff"></td>
					</tr>
					<tr class="mobile_only">
						<td class="w640"  height="20" width="640" bgcolor="#ffffff"></td>
					</tr>
					<tr>
						<td id="header" class="w640" align="center" width="640">
							<table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
								<tr>
									<td class="w30" width="30"></td>
									<td id="logo" width="{{ $logo['width'] }}" valign="top">
										<img border="0" src="{{ $logo['path'] }}" alt="{{ $senderName or ''}}" width="{{ $logo['width'] }}" height="{{ $logo['height'] }}" />
									</td>
									<td class="w30" width="30"></td>
								</tr>
								<tr>
									<td colspan="3" height="20" class="large_only"></td>
								</tr>
								<tr>
									<td colspan="3" height="20" class="large_only"></td>
								</tr>
							</table>
						</td>
					</tr>

					<tr>
						<td class="w640" bgcolor="#ffffff" width="640">
							<table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
								<tbody>
								Un nuevo contacto ha sido creado. 
								{ $name }
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td class="w640" bgcolor="#ffffff" width="640" colspan="3" height="20"></td>
					</tr>
					<tr>
						<td class="w640" bgcolor="#ffffff" width="640" colspan="3" height="20"></td>
					</tr>
					<tr>
						<td class="w640" width="640" colspan="3" height="20"></td>
					</tr>
					<tr>
						<td id="footer" class="w640" height="60" width="640" align="center">
							Buen Cafe - Contact Manager
						</td>
					</tr>
					<tr>
						<td class="w640" width="640" colspan="3" height="40"></td>
					</tr>
					</tbody>
				</table>
			</td>
		</tr>
		</tbody>
	</table>
	</body>
</html>