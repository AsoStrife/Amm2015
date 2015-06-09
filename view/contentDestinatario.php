<div class="input-form">
    <h3>Inserisci l'indirizzo del destinatario</h3>

    <form method="post" action="index.php?page=spedizione">
        <input type='hidden' name="cmd" value='destinatario'/>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $destinatario->getNome() ?>"/>
        <br>
        <label for="cognome">Cognome</label>
        <input type="text" name="cognome" id="cognome" value="<?= $destinatario->getCognome() ?>"/> 
        <label for="via">Via</label>
        <input type="text" name="via" id="via" value="<?= $destinatario->getVia() ?>"/> 
        <label for="civico">Numero Civico</label>
        <input type="text" name="civico" id="civico" value="<?= $destinatario->getNumeroCivico() ?>"/> 
        <label for="citta">Citt&agrave;</label>
        <input type="text" name="citta" id="citta" value="<?= $destinatario->getCitta() ?>"/> 
        <label for="cap">CAP</label>
        <input type="text" name="cap" id="cap" value="<?= $destinatario->getCap() ?>"/> 
        <br/>
        <button type="submit" value="destinatario">Salva</button>
    </form>
</div>