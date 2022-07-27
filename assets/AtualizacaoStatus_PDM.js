var ControleCampo = 1;
function NovaEtapa(ControleFormulario){
    // script para trazer as equipes
    let quantidade_equipes = document.querySelector('#equipe_1').getAttribute('data-equipes');

    let equipes = [];
    for (let ControleOption = 1; ControleOption < parseInt(quantidade_equipes)+1; ControleOption++){
        let equipe = document.querySelector('#equipe_option'+ControleOption).innerHTML;
        equipes.push(equipe);
    }
    let matricula = equipes.map(function(equipeName){
        return '<option>'+equipeName+'</option>';
    });
    let equipes_string = matricula.join('');
    // =============================
    ControleCampo++;
    let html = "";
    html += "<div id='etapa-"+ControleCampo+"'><hr/>";
        html += "Início<input type='datetime-local' name='inicioProg[]' />";
        html += "Fim<input type='datetime-local' name='fimProg[]' /><hr/>";
        html += "<div class='tabela_niv_title'>Dados complementares</div>";
        html += "<select name='NecessDeslig[]'>";
            html += "<option selected disabled>Necessita de desligamentos?</option>";
            html += "<option>Sim</option>";
            html += "<option>Não</option>";
        html += "</select>";
        html += "<select name='TipoDeslig[]'>";    
            html += "<option selected disabled>Tipo de SI</option>";
            html += "<option>N/A</option>";
            html += "<option>Bloqueio</option>";
            html += "<option>Outros</option>";
            html += "<option>Bloqueio+Outros</option>";
        html += "</select>";
        html += "Defeitos<input type='number' name='defeito[]' /><hr/>";
        html += "<div class='tabela_niv_title'>Equipes executantes</div>";
        for (let i = 1; i < 6; i++){
            html += "<select name='Equipe_"+i+"[]'>";
                html += "<option selected disabled>Equipe "+i+"</option>";
                html += "<option>null</option>"+equipes_string;
            html += "</select>";
        }
        html += "<hr/><textarea name='nota-ctrl[]' placeholder='Nota Control.'></textarea>";
        html += "<button type='button' class='removerEtapa' onclick='removerEtapa("+ControleCampo+")'>- etapa</button><hr/>";
    html += "</div>";
    document.getElementById('area-prog-'+ControleFormulario).insertAdjacentHTML("beforeend", html);
}
function removerEtapa(idCampo){
    document.querySelector('#etapa-'+idCampo).remove();
}
function abrirSubMenu1(){
    document.querySelector('#sub-sub-sub-menu-1').style.height='auto'; // habilitar menu de encerramento
    document.querySelector('#sub-sub-sub-menu-1').style.display='block'; // habilitar menu de encerramento
    document.querySelector('#sub-sub-sub-menu-2').style.height='0';
    document.querySelector('#sub-sub-sub-menu-2').style.display='none';
    document.querySelector('#sub-sub-sub-menu-3').style.height='0';
    document.querySelector('#sub-sub-sub-menu-3').style.display='none';
    document.querySelector('#sub-sub-sub-menu-4').style.height='0';
    document.querySelector('#sub-sub-sub-menu-4').style.display='none';
console.log('teste');
}
function abrirSubMenu2(){
    document.querySelector('#sub-sub-sub-menu-1').style.height='0';
    document.querySelector('#sub-sub-sub-menu-1').style.display='none';
    document.querySelector('#sub-sub-sub-menu-2').style.height='auto'; // habilitar menu de encerramento
    document.querySelector('#sub-sub-sub-menu-2').style.display='block'; // habilitar menu de encerramento
    document.querySelector('#sub-sub-sub-menu-3').style.height='0';
    document.querySelector('#sub-sub-sub-menu-3').style.display='none';
    document.querySelector('#sub-sub-sub-menu-4').style.height='0';
    document.querySelector('#sub-sub-sub-menu-4').style.display='none';
}
function abrirSubMenu3(){
    document.querySelector('#sub-sub-sub-menu-1').style.height='0';
    document.querySelector('#sub-sub-sub-menu-1').style.display='none';
    document.querySelector('#sub-sub-sub-menu-2').style.height='0';
    document.querySelector('#sub-sub-sub-menu-2').style.display='none';
    document.querySelector('#sub-sub-sub-menu-3').style.height='auto'; // habilitar menu de encerramento
    document.querySelector('#sub-sub-sub-menu-3').style.display='block'; // habilitar menu de encerramento
    document.querySelector('#sub-sub-sub-menu-4').style.height='0';
    document.querySelector('#sub-sub-sub-menu-4').style.display='none';
}
function abrirSubMenu4(){
    document.querySelector('#sub-sub-sub-menu-1').style.height='0';
    document.querySelector('#sub-sub-sub-menu-1').style.display='none';
    document.querySelector('#sub-sub-sub-menu-2').style.height='0';
    document.querySelector('#sub-sub-sub-menu-2').style.display='none';
    document.querySelector('#sub-sub-sub-menu-3').style.height='0';
    document.querySelector('#sub-sub-sub-menu-3').style.display='none';
    document.querySelector('#sub-sub-sub-menu-4').style.height='auto'; // habilitar menu de relatorios
    document.querySelector('#sub-sub-sub-menu-4').style.display='block'; // habilitar menu de relatorios
}
function ChamarDivGrade(){
    document.querySelector('.grade-prog').style.display='block';
    document.querySelector('.desligamento').style.display='none';
}
function ChamarDivDeslig(){
    document.querySelector('.grade-prog').style.display='none';
    document.querySelector('.desligamento').style.display='block';
}