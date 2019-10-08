<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Email</title>
	<style>
		@font-face {
			font-family: 'Roboto'; font-style: normal; font-weight: 400; src: local('Roboto'), local('Roboto-Regular'), url('https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4mxP.ttf') format('truetype');
		}
		body[yahoo] .hide {
			display: none !important;
		}
		.tabela-header{
			width: 100%;
		}
		@media only screen and (min-device-width: 601px) {
			.tabela-header{width: 130px;}
			.content {width: 600px !important;}
		}
	</style>
</head>
	<body yahoo="" bgcolor="#ffffff" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px; margin: 0; padding: 0;">
		<!--[if (gte mso 9)|(IE)]>
		<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
		    <tr>
		        <td>
		            <![endif]-->
					<table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
	          			<tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
	          				<td class="header" bgcolor="#ffffff" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px; border-bottom-width: 2px; border-bottom-color: #000; border-bottom-style: solid; padding: 40px 20px 20px;">
								<table class="tabela-header" align="left" border="0" cellpadding="0" cellspacing="0" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px; width: 130px; text-align: center;">
								    <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
								        <td height="80" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px; padding: 0 20px 20px 0;">
								            <!-- <img src="{{-- url("imagens/logo-agerio-site-01.png") --}}" width="130" height="80" border="0" alt="" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;" /> -->
								        </td>
								    </tr>
								</table>
								@yield('content')
									<tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
										<td class="bodycopy paddingtop aviso" align="center" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 14px; line-height: 25px; margin: 0px; padding: 15px 0;">
											Mensagem automática. Por favor, não responda a este e-mail
										</td>
									</tr>
						        </table>
						    </td>
						</tr>
	              	</table>
					<!--[if (gte mso 9)|(IE)]>
				</td>
			</tr>
		</table>
		<![endif]-->
	</body>
</html>
