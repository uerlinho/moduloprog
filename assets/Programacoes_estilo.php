<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Questrial&display=swap'); /*fonte importada do google fonts*/
html{
    height: 100vh;
}
body{
    margin: 0;
    padding: 0;
    font-family: Calibri;
    font-size: 14px;
    min-height: 100vh;
}
.form-base{
    display: flex;
    flex-direction: column;
}
.analisa-base, .dados-base{
    margin-top: 10px;
    border-top: 1px solid #f1f1f1;
    display: flex;
    flex: 1;
    align-items: center;
}
.analisa-base input[type='file']{
    display: none;
}
.analisa-base label{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f1f1f1;
    height: 34px;
    margin: 5px;
    font-weight: normal;
    padding: 5px;
    width: 250px;
    border-radius: 3px;
}
.aba{
    border: 1px solid #f1f1f1;
    display: inline-block;
    padding: 10px;
    margin: 5px 0 0 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.desligamento{
    display:none;
}
.grade-prog{
    margin: 5px;
}
.notification{
    background-color: #F24405;
    color: #fff;
    border-radius: 3px;
    padding: 3px;
    margin-left: 5px;
}
thead th{
    text-align: center !important;
}
.aba:hover{
    background-color: #f1f1f1;
    cursor: pointer;
}
.analisa-base button{
    border-radius: 15px;
}
.analisa-base label:hover{
    border-bottom: 5px solid #ccc;
    cursor: pointer;
}
.titulo_lista{
    font-weight: bold;
}
.container{
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 30px;
    margin:0px 50px;
}
.cabecalho{
    width: auto;
    height: 30px;
    background-color: rgb(243, 243, 243);
}

.principal{
    display: flex;
    width: auto;
    min-height: 100vh;
}
.painel_principal{
    max-width: 1596px;
}
.menu{
    height: auto;
    width: 200px;
    border-right: 1px solid rgb(238, 238, 238);
}
.painel{
    flex: 1;
    border-right: 1px solid rgb(233, 233, 233);
    background-color: #f6f8fa;
}
.aba_rapida{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    background-color: rgb(9, 9, 32);
    color: #fff;
    border-bottom: 1px solid rgb(23, 23, 88);
    height: 34px;
}
.aba_rapida span a{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    color: #fff;
    text-decoration: none;
    padding: 0 10px 0 10px;
    height: 100%;
}
#sair:hover{
    background-color: #F24405;
}
.aba_rapida span{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    height: 100%;
}
.aba_rapida span a:hover{
    background-color: #838383;
}
p, span{
    margin:0;
    padding: 0;
    padding-left: 10px;
}

td{
    text-align: center;
}
.mapa_niv, .tabela_niv, .farol_niv, .fragmentador, .solicitacao_niv{
    margin: 5px;
    height: auto;
    padding-bottom: 5px;
    border-radius: 3px;
    background-color: #fff;
    border: 1px solid rgb(230, 230, 230);
}
.tabela_niv{
    box-shadow: 5px 5px 5px #f1f1f1;
}
.mapa_niv_title, .tabela_niv_title, .farol_niv_title, 
.fragmentador_title, .solicitacao_niv_title{
    background-color: rgb(243, 243, 243);
    display: flex;
    align-items: center;
    border-bottom: 3px solid rgb(230, 230, 230);
    height: 20px;
    padding-left: 10px;
}
select, input, textarea{
    font-family: Calibri;
    margin-right: 5px;
    margin-top: 5px;
    margin-left: 5px;
    padding: 5px;
    border: 1px solid rgb(230, 230, 230);
}
tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
}
textarea{
    margin-top: 5px;
    resize: none;
    width: 850px;
    height: 50px;
}
button, #btn-prog, input[type='submit']{
    display: inline;
    width: 100px;
    height: 28px;
    border: 1px solid #1b8b66;
    background-color: #1fa67a;
    color: #fff;
    border-radius: 3px;
    font-family: Calibri;
    cursor: pointer;
}
button:hover,#btn-prog:hover, input[type='submit']:hover{
    background-color: #fff;
    color:#1b8b66;
}
.removerEtapa{
    display: inline;
    width: 100px;
    height: 28px;
    border: 1px solid #F2A71B;
    background-color: #F2A71B;
    color: #fff;
    border-radius: 3px;
    font-family: Calibri;
    cursor: pointer;
}
.removerEtapa:hover{
    background-color: #fff;
    color:#F2A71B;
}
/*menu*/
.sub-menu{
    margin:0;
    padding: 0px 0px 0px 20px;
}
.sub-sub-menu li{
    display: flex;
    align-items: center;
    list-style-type: none;
    height: 34px;
    cursor: pointer;
    border-bottom: 3px solid #f1f1f1;
}
.sub-sub-menu{
    transition: height 2s;
}
.qnt_pend{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #F24405;
    font-weight: bold;
    color: #fff;
    border-radius: 3px;
    text-align: center;
}
#sub-sub-sub-menu-1,
#sub-sub-sub-menu-2,
#sub-sub-sub-menu-3,
#sub-sub-sub-menu-4{
    display: none;
    height: 0;
    transition: height 2s;
    background-color: #f1f1f1;
}
#sub-sub-sub-menu-1 li,
#sub-sub-sub-menu-2 li,
#sub-sub-sub-menu-3 li,
#sub-sub-sub-menu-4 li{
    display: block;
    height: auto;
}
.sub-sub-menu li a{
    display: block;
    text-decoration: none;
    color: #000;
    padding: 7px 12px;
}
.sub-sub-menu li a:hover{
    background-color: #f6f8fa;
    border-right: 3px solid rgb(23, 23, 88);
}
.titulo_lista{
    padding: 10px 0px;
    text-transform: uppercase;
    color: rgb(95, 95, 95);
    list-style-type: none;
}
hr{
    margin: 10px;
}
.dados_ordem, .dados_prog, .nota_ordem{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap:wrap;
    margin-top: 5px;
    margin-left: 5px;

}
#topo{
    display: none;
    justify-content: center;
    align-items: center;
    position: fixed;
    bottom: 30px;
    right: 20px;
    background-color: #1fa67a;
    color: #fff;
    width: 70px;
    height: 50px;
    border-radius: 10px;
}
/*==================*/
footer{
    display: flex;
    flex-direction: column;
    height: 100px;
}
footer #parte-1{
    height: 80%;
    background-color: #838383;
}
footer #parte-2{
    flex:1;
    text-align: center;
    background-color: #f1f1f1;
}
</style>