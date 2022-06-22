// left
const adaware_result = document.getElementById("adaware_result")
const ahnlab_result = document.getElementById("ahnlab_result")
const alyac_result = document.getElementById("alyac_result")
const avast_result = document.getElementById("avast_result")
const avg_result = document.getElementById("avg_result")
const avira_result = document.getElementById("avira_result")
const bitdef_result = document.getElementById("bitdef_result")
const bullguard_result = document.getElementById("bullguard_result")
const clamav_result = document.getElementById("clamav_result")
const comodo_result = document.getElementById("comodo_result")
const drweb_result = document.getElementById("drweb_result")
const emsisoft_result = document.getElementById("emsisoft_result")
const eset_result = document.getElementById("eset_result")

// right
const fortinet_result = document.getElementById("fortinet_result")
const fsecure_result = document.getElementById("fsecure_result")
const ikarus_result = document.getElementById("ikarus_result")
const kis_result = document.getElementById("kis_result")
const mcafee_result = document.getElementById("mcafee_result")
const malwarebytes_result = document.getElementById("malwarebytes_result")
const panda_result = document.getElementById("panda_result")
const sophos_result = document.getElementById("sophos_result")
const trend_result = document.getElementById("trend_result")
const webroot_result = document.getElementById("webroot_result")
const windef_result = document.getElementById("windef_result")
const zonealarm_result = document.getElementById("zonealarm_result")
const zillya_result = document.getElementById("zillya_result")


function initValues () {
    const response = localStorage.getItem('response');
    const fileName = localStorage.getItem('currFile');
    const data = JSON.parse(response);

    // first
    var adaware = data.data.data.results.adaware.objects[fileName].detect_name;
    var ahnlab = data.data.data.results.ahnlab.objects[fileName].detect_name;
    var alyac = data.data.data.results.alyac.objects[fileName].detect_name;
    var avast = data.data.data.results.avast.objects[fileName].detect_name;
    var avg = data.data.data.results.avg.objects[fileName].detect_name;
    var avira = data.data.data.results.avira.objects[fileName].detect_name;
    var bitdef = data.data.data.results.bitdef.objects[fileName].detect_name;
    var bullguard = data.data.data.results.bullguard.objects[fileName].detect_name;
    var clamav = data.data.data.results.clam.objects[fileName].detect_name;
    var comodo = data.data.data.results.comodo.objects[fileName].detect_name;
    var drweb = data.data.data.results.drweb.objects[fileName].detect_name;
    var emisoft = data.data.data.results.emsisoft.objects[fileName].detect_name;
    var eset = data.data.data.results.nod32.objects[fileName].detect_name;

    // second
    var fortinet = data.data.data.results.fortinet.objects[fileName].detect_name;
    var fsecure = data.data.data.results.fsec.objects[fileName].detect_name;
    var ikarus = data.data.data.results.ikarus.objects[fileName].detect_name;
    var kis = data.data.data.results.kasper.objects[fileName].detect_name;
    var mcafee = data.data.data.results.mcafeetp.objects[fileName].detect_name;
    var malwarebytes = data.data.data.results.mbytes.objects[fileName].detect_name;
    var panda = data.data.data.results.pandagp.objects[fileName].detect_name;
    var sophos = data.data.data.results.sophos.objects[fileName].detect_name;
    var trend = data.data.data.results.trend.objects[fileName].detect_name;
    var webroot = data.data.data.results.webroot.objects[fileName].detect_name;
    var windef = data.data.data.results.mssec.objects[fileName].detect_name;
    var zonealarm = data.data.data.results.zonealarm.objects[fileName].detect_name;
    var zillya = data.data.data.results.zillya.objects[fileName].detect_name;


    adaware_result.innerHTML = adaware ? `<strong style="color: red;">${adaware}</strong>` : '<strong style="color: green;">Clean</strong>'
    ahnlab_result.innerHTML = ahnlab ? `<strong style="color: red;">${ahnlab}</strong>` : '<strong style="color: green;">Clean</strong>'
    alyac_result.innerHTML = alyac ? `<strong style="color: red;">${alyac}</strong>` : '<strong style="color: green;">Clean</strong>'
    avast_result.innerHTML = avast ? `<strong style="color: red;">${avast}</strong>` : '<strong style="color: green;">Clean</strong>'
    avg_result.innerHTML = avg ? `<strong style="color: red;">${avg}</strong>` : '<strong style="color: green;">Clean</strong>'
    avira_result.innerHTML = avg ? `<strong style="color: red;">${avira}</strong>` : '<strong style="color: green;">Clean</strong>'
    bitdef_result.innerHTML = bitdef ? `<strong style="color: red;">${bitdef}</strong>` : '<strong style="color: green;">Clean</strong>'
    bullguard_result.innerHTML = bullguard ? `<strong style="color: red;">${bullguard}</strong>` : '<strong style="color: green;">Clean</strong>'
    clamav_result.innerHTML = clamav ? `<strong style="color: red;">${clamav}</strong>` : '<strong style="color: green;">Clean</strong>'
    comodo_result.innerHTML = comodo ? `<strong style="color: red;">${comodo}</strong>` : '<strong style="color: green;">Clean</strong>'
    drweb_result.innerHTML = drweb ? `<strong style="color: red;">${drweb}</strong>` : '<strong style="color: green;">Clean</strong>'
    emsisoft_result.innerHTML = emisoft ? `<strong style="color: red;">${emisoft}</strong>` : '<strong style="color: green;">Clean</strong>'
    eset_result.innerHTML = eset ? `<strong style="color: red;">${eset}</strong>` : '<strong style="color: green;">Clean</strong>'

    fortinet_result.innerHTML = fortinet ? `<strong style="color: red;">${fortinet}</strong>` : '<strong style="color: green;">Clean</strong>'
    fsecure_result.innerHTML = fsecure ? `<strong style="color: red;">${fsecure}</strong>` : '<strong style="color: green;">Clean</strong>'
    ikarus_result.innerHTML = ikarus ? `<strong style="color: red;">${ikarus}</strong>` : '<strong style="color: green;">Clean</strong>'
    kis_result.innerHTML = kis ? `<strong style="color: red;">${kis}</strong>` : '<strong style="color: green;">Clean</strong>'
    mcafee_result.innerHTML = mcafee ? `<strong style="color: red;">${mcafee}</strong>` : '<strong style="color: green;">Clean</strong>'
    malwarebytes_result.innerHTML = malwarebytes ? `<strong style="color: red;">${malwarebytes}</strong>` : '<strong style="color: green;">Clean</strong>'
    panda_result.innerHTML = panda ? `<strong style="color: red;">${panda}</strong>` : '<strong style="color: green;">Clean</strong>'
    sophos_result.innerHTML = sophos ? `<strong style="color: red;">${sophos}</strong>` : '<strong style="color: green;">Clean</strong>'
    trend_result.innerHTML = trend ? `<strong style="color: red;">${trend}</strong>` : '<strong style="color: green;">Clean</strong>'
    webroot_result.innerHTML = webroot ? `<strong style="color: red;">${webroot}</strong>` : '<strong style="color: green;">Clean</strong>'
    windef_result.innerHTML = windef ? `<strong style="color: red;">${windef}</strong>` : '<strong style="color: green;">Clean</strong>'
    zonealarm_result.innerHTML = zonealarm ? `<strong style="color: red;">${zonealarm}</strong>` : '<strong style="color: green;">Clean</strong>'
    zillya_result.innerHTML = zillya ? `<strong style="color: red;">${zillya}</strong>` : '<strong style="color: green;">Clean</strong>'
}

const main = document.getElementById('main');

console.log(main.style);

function getResponse(){
    main.style.opacity = "1";
   initValues();
}