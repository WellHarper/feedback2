@extends('layouts.templateemail')

@section('title', 'feedback')

@section('content')

<!--[if (gte mso 9)|(IE)]>
            <table width="400" align="left" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
                    <![endif]-->
                        <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 400px !important; max-width: 400px; font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                            <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                                <td height="80" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                                        <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                                            <td class="h1" style="font-family: 'Roboto', sans-serif; color: #153643; font-size: 50px; line-height: 38px; font-weight: bold; padding: 5px 0 0;" align="center">
                                                Feedback
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
    </td>
</tr>
<tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
    <td class="innerpadding" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px; padding: 30px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
            <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                <td class="h2" style="font-family: 'Roboto', sans-serif; color: #153643; font-size: 24px; line-height: 28px; font-weight: bold; padding: 0 0 15px;">
                    Obrigado por participar da Semana profissionalizante do CSI,
                </td>
            </tr>
            <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                <td class="bodycopy" style="font-family: 'Roboto', sans-serif; color: #153643; font-size: 16px; line-height: 22px; padding: 0 0 15px;">
                    Agradecemos seu feedback! Ele é muito importante para melhorar nosso projeto!
                </td>
            </tr>
            <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                <td class="bodycopy borderbottomfino" style="font-family: 'Roboto', sans-serif; color: #153643; font-size: 16px; border-bottom-width: 1px; border-bottom-color: #000; border-bottom-style: solid; line-height: 22px; padding: 0 0 15px;">
                    <strong style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">Dados do feedback:</strong>
                </td>
            </tr>
            <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                <td class="bodycopy" style="font-family: 'Roboto', sans-serif; color: #153643; font-size: 16px; line-height: 22px; padding: 0 0 15px;border-bottom-width: 1px; border-bottom-color: #000; border-bottom-style: solid;">
                    <p style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;"><strong>Nome:</strong> {{$name}}</p>
                    <p style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;"><strong>E-mail:</strong> {{$email}}</p>
                </td>
            </tr>
            <tr style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">
                <td class="bodycopy paddingtop" style="font-family: 'Roboto', sans-serif; color: #153643; font-size: 16px; line-height: 22px; padding: 15px 0;border-bottom-width: 1px; border-bottom-color: #000; border-bottom-style: solid;">
                    <strong style="font-family: 'Roboto', sans-serif; color: #595959; font-size: 16px;">Seu nome em binario:</strong> {{ $text2bin }}
                </td>
            </tr>

@endsection