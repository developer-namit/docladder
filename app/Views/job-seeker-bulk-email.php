<!-- Complete Email template -->

<body style="background-color:grey">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="550" bgcolor="white" style="border:2px solid black">
        <tbody>
            <tr>
                <td align="center">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="col-550" width="550">
                        <tbody>
                            <tr>
                                <td height="50px" style="padding-top: 10px; padding-left: 10px;">

                                    <a style="text-decoration: none;" href="https://tryyourwork.com/docladder/Home">
                                        <img src="https://tryyourwork.com/docladder/public/assets/images/Docladder-final-logo.png" alt="logo" width="250px"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="height: 300px;">
                <td align="center" style="border: none;
                           border-bottom: 2px solid #0D7E82;
                           padding-right: 20px;padding-left:20px">

                    <?= (isset($message)) ? $message : '';  ?>

                </td>
            </tr>
            <tr style="border: none;
    background-color: #0D7E82;
    height: 40px;
    color:white;
    padding-bottom: 20px;
    text-align: center;">
                <td height="40px" align="center">
                    <a href="#" style="border:none;
    text-decoration: none;
    padding: 5px;">
                        <img height="30" src="https://extraaedgeresources.blob.core.windows.net/demo/salesdemo/EmailAttachments/icon-twitter_20190610074030.png" width="30" />
                    </a>

                    <a href="#" style="border:none; text-decoration: none; padding: 5px;">

                        <img height="30" src="https://extraaedgeresources.blob.core.windows.net/demo/salesdemo/EmailAttachments/icon-linkedin_20190610074015.png" width="30" />
                    </a>

                    <a href="#" style="border:none; text-decoration: none; padding: 5px;">

                        <img height="20" src="https://extraaedgeresources.blob.core.windows.net/demo/salesdemo/EmailAttachments/facebook-letter-logo_20190610100050.png" width="24" style="position: relative; padding-bottom: 5px;" />
                    </a>
                </td>
            </tr>
            <tr>
                <td style="font-family:'Open Sans', Arial, sans-serif;
    font-size:11px; line-height:18px;
    color:#999999;" valign="top" align="center">
                    <a href="#" target="_blank" style="color:#999999;
    text-decoration:underline;">PRIVACY STATEMENT</a>
                    |
                    <a href="#" target="_blank" style="color:#999999; text-decoration:underline;">TERMS OF SERVICE</a>
                    |
                    <a href="#" target="_blank" style="color:#999999; text-decoration:underline;">RETURNS</a>
                    <br>
                    © 2022 DOCLADDER. ALL RIGHTS RESERVED<br>
                    If you do not wish to receive any further emails from us, please
                    <a href="#" target="_blank" style="text-decoration:none;
    color:#999999;">unsubscribe</a>
                </td>
            </tr>
        </tbody>
    </table>
    </td>
    </tr>
    <tr>
        <td class="em_hide" style="line-height:1px;
    min-width:700px;
    background-color:#ffffff;">
            <img alt="" src="images/spacer.gif" style="max-height:1px;
    min-height:1px;
    display:block;
    width:700px;
    min-width:700px;" width="700" border="0" height="1">
        </td>
    </tr>
    </tbody>
    </table>
</body>