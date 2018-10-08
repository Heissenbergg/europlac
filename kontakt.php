<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
        
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
        <link rel="stylesheet" href="../kontakt/css/kontakt.css" type="text/css" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link rel="stylesheet" href="../menu/css/menu.css" type="text/css" />
        <!-- mobile version css -->
    
        <!-- SCRIPTS -->
    	<script type="text/javascript" src="menu/js/menu.js"></script>
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        <script src="kontakt/js/kontakt.js"></script><script src="https://use.fontawesome.com/85a780918f.js"></script>

    </head>
    
    <body onload="hideLoading();">
        <?php require_once('menu/menu.php'); ?>
        
        <!-- mobile version -->
        <div id="mobileMainWrapper">
            <div id="mobileMainWrapperHeader">
                <h4>Kontaktirajte nas</h4>
            </div>
            
            <div id="mobileMainWrapperContactInfo">
                <!-- lokacija -->
                <div id="mobileMainWrapperContactInfoTabs">
                    <div id="mobileMainWrapperContactInfoTabsImage">
                        <img id="mainWrapperContactWrapperContactFormInfoLocationImageImg" src="../images/location.png"></img>
                    </div>
                    <div id="mobileMainWrapperContactInfoTabsParagraph">
                        <p id="mainWrapperContactWrapperContactFormInfoLocationParagraphPar" >Lojićka bb, 77220 Cazin</p>
                    </div>
                </div>
                    <!-- telefon -->
                <div id="mobileMainWrapperContactInfoTabs">
                    <div id="mobileMainWrapperContactInfoTabsImage">
                        <img id="mainWrapperContactWrapperContactFormInfoLocationImageImg" src="../images/location.png"></img>
                    </div>
                    <div id="mobileMainWrapperContactInfoTabsParagraph">
                        <p id="mainWrapperContactWrapperContactFormInfoLocationParagraphPar" >+38761/786-860</p>
                    </div>
                </div>
                <!-- faks -->
                <div id="mobileMainWrapperContactInfoTabs">
                    <div id="mobileMainWrapperContactInfoTabsImage">
                        <img id="mainWrapperContactWrapperContactFormInfoLocationImageImg" src="../images/location.png"></img>
                    </div>
                    <div id="mobileMainWrapperContactInfoTabsParagraph">
                        <p id="mainWrapperContactWrapperContactFormInfoLocationParagraphPar" >+38737/516-096</p>
                    </div>
                </div>
                        <!-- email -->
                <div id="mobileMainWrapperContactInfoTabs">
                    <div id="mobileMainWrapperContactInfoTabsImage">
                        <img id="mainWrapperContactWrapperContactFormInfoLocationImageImg" src="../images/location.png"></img>
                    </div>
                    <div id="mobileMainWrapperContactInfoTabsParagraph">
                        <p id="mainWrapperContactWrapperContactFormInfoLocationParagraphPar" >info@europlac-nekretnine.com</p>
                    </div>
                </div>
            </div>
            
            <div id="mobileMainWrapperMap"></div>
            
            <div id="mobileMainWrapperInput">
                <div id="mobileMainWrapperInputHeader">
                    <p id="mainWrapperContactWrapperContactFormContactHeaderPar">Pošaljite nam poruku</p>
                </div>
                
                <div id="mobileMainWrapperInputName">
                    <input id="mobileMainWrapperInputNameInput" type="text" name="imeIprezime" placeholder="Ime i prezime" autocomplete="off"/>
                </div>
                
                <div id="mobileMainWrapperInputPhone">
                    <input id="mobileMainWrapperInputPhoneInput" type="text" name="brojTelefona" placeholder="Broj telefona" autocomplete="off" />
                </div>
                
                <div id="mobileMainWrapperInputEmail">
                    <input id="mobileMainWrapperInputEmailInput" type="text" name="email" placeholder="Email" autocomplete="off" />
                </div>
                
                <div id="mobileMainWrapperInputCompany">
                    <input id="mobileMainWrapperInputCompanyInput" type="text" name="brojTelefona" placeholder="Broj telefona" autocomplete="off" />
                </div>
                
                <div id="mobileMainWrapperInputMessage">
                    <textarea id="mobileMainWrapperInputMessageInput" autocomplete="off" placeholder="Tekst poruke" ></textarea>
                    <div id="mobileMainWrapperInputMessageSubmit" onclick="sendMail();">
                        <img id="mobileMainWrapperInputMessageSubmitImg" src="../images/send4.png"></img>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- end of mobile version -->
        
        
        <div id="mainWrapper">
            <div id="mainWrapperContactWrapper">
                <div id="header">
                        <p>Kontaktirajte nas</p>
                    </div>
                <div id="mainWrapperContactWrapperMap">
                    <div id="mainWrapperContactWrapperMapHeader">
                        <p id="mainWrapperContactWrapperMapHeaderPar">Kontaktirajte nas</p>
                    </div>
                    <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA&callback=mapa">
                    </script>
                    
                    <!--
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA&callback=mapa"
                        async defer>
                    </script>
                    -->
                </div>
                
                <div id="mainWrapperContactWrapperContactForm">
                    <div id="mainWrapperContactWrapperContactFormContact">
                        <div id="mainWrapperContactWrapperContactFormContactHeader">
                            <p id="mainWrapperContactWrapperContactFormContactHeaderPar">Pošaljite nam poruku</p>
                        </div>
                        
                        <div id="mainWrapperContactWrapperContactFormContactLeftHalf">
                            <input id="mainWrapperContactWrapperContactFormContactLeftHalfImeIPrezime" type="text" name="imeIprezime" placeholder="Ime i prezime" autocomplete="off"/>
                            <input id="mainWrapperContactWrapperContactFormContactLeftHalfBrojTelefona" type="text" name="brojTelefona" placeholder="Broj telefona" autocomplete="off" />
                        </div>
                        
                        <div id="mainWrapperContactWrapperContactFormContactRightHalf">
                            <input id="mainWrapperContactWrapperContactFormContactRightHalfEmail" type="text" name="email" placeholder="Email" autocomplete="off" />
                            <input id="mainWrapperContactWrapperContactFormContactRightHalfCompany" type="text" name="company" placeholder="Kompanija" autocomplete="off" />
                        </div>
                        
                        <div id="mainWrapperContactWrapperContactFormContactMessage">
                            <textarea id="mainWrapperContactWrapperContactFormContactMessageTextarea" autocomplete="off" placeholder="Tekst poruke" ></textarea>
                            <!-- <input id="mainWrapperContactWrapperContactFormContactMessageSubmit" type="submit" name="submit" value="Pošalji" /> -->
                            <div id="mainWrapperContactWrapperContactFormContactMessageSubmit">
                                <img id="mainWrapperContactWrapperContactFormContactMessageSubmitImg" src="../images/send4.png"></img>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div id="mainWrapperContactWrapperContactFormInfo">
                        <div id="mainWrapperContactWrapperContactFormInfoHeader">
                            <p id="mainWrapperContactWrapperContactFormInfoHeaderPar" >Kontakt info</p>
                        </div>
                        <!-- lokacija -->
                        <div id="mainWrapperContactWrapperContactFormInfoLocation">
                            <div id="mainWrapperContactWrapperContactFormInfoLocationImage">
                                <img id="mainWrapperContactWrapperContactFormInfoLocationImageImg" src="../images/location.png"></img>
                            </div>
                            <div id="mainWrapperContactWrapperContactFormInfoLocationParagraph">
                                <p id="mainWrapperContactWrapperContactFormInfoLocationParagraphPar" >Lojićka bb, 77220 Cazin</p>
                            </div>
                        </div>
                        <!-- telefon -->
                        <div id="mainWrapperContactWrapperContactFormInfoPhone">
                            <div id="mainWrapperContactWrapperContactFormInfoPhoneImage">
                                <img id="mainWrapperContactWrapperContactFormInfoPhoneImageImg" src="../images/phone.png"></img>
                            </div>
                            <div id="mainWrapperContactWrapperContactFormInfoPhoneParagraph">
                                <p id="mainWrapperContactWrapperContactFormInfoPhoneParagraphPar">+38761/786-860</p>
                            </div>
                        </div>
                        <!-- faks -->
                        <div id="mainWrapperContactWrapperContactFormInfoFax">
                            <div id="mainWrapperContactWrapperContactFormInfoFaxImage">
                                <img id="mainWrapperContactWrapperContactFormInfoFaxImageImg" src="../images/telephone.png"></img>
                            </div>
                            <div id="mainWrapperContactWrapperContactFormInfoFaxParagraph">
                                <p id="mainWrapperContactWrapperContactFormInfoFaxParagraphPar">+38737/516-096</p>
                            </div>
                        </div>
                        <!-- email -->
                        <div id="mainWrapperContactWrapperContactFormInfoEmail">
                            <div id="mainWrapperContactWrapperContactFormInfoEmailImage">
                                <img id="mainWrapperContactWrapperContactFormInfoEmailImageImg" src="../images/email3.png"></img>
                            </div>
                            <div id="mainWrapperContactWrapperContactFormInfoEmailParagraph">
                                <p id="mainWrapperContactWrapperContactFormInfoEmailParagraphPar">info@euro-plac.ba</p>
                            </div>
                        </div>
                        <div id="mainWrapperContactWrapperContactFormInfoSocial">
                            <!-- facebook -->
                            <div id="mainWrapperContactWrapperContactFormInfoSocialFacebook">
                                <div id="mainWrapperContactWrapperContactFormInfoSocialFacebookImage">
                                    <img id="mainWrapperContactWrapperContactFormInfoSocialFacebookImageImg" src="../images/facebook.png"></img>
                                </div>
                            </div>
                            <!-- youtube -->
                            <div id="mainWrapperContactWrapperContactFormInfoSocialYoutube">
                                <div id="mainWrapperContactWrapperContactFormInfoSocialYoutubeImage">
                                    <img id="mainWrapperContactWrapperContactFormInfoSocialYoutubeImageImg" src="../images/youtube.png"></img>
                                </div>
                            </div>
                            <!-- google-plus -->
                            <div id="mainWrapperContactWrapperContactFormInfoSocialGoogle">
                                <div id="mainWrapperContactWrapperContactFormInfoSocialGoogleImage">
                                    <img id="mainWrapperContactWrapperContactFormInfoSocialGoogleImageImg" src="../images/google-plus.png"></img>
                                </div>
                            </div>
                            <!-- linkedin -->
                            <div id="mainWrapperContactWrapperContactFormInfoSocialLinkedin">
                                <div id="mainWrapperContactWrapperContactFormInfoSocialLinkedinImage">
                                    <img id="mainWrapperContactWrapperContactFormInfoSocialLinkedinImageImg" src="../images/linkedin.png"></img>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    
                </div>
                
            </div>
        </div>
    </body>
</html>