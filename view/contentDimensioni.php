<div class="input-form">
    <h3>Inserisci l'indirizzo del destinatario</h3>

    <form method="post" action="index.php?page=spedizione">
        <input type='hidden' name="cmd" value='pacco'/>
        <label for="larghezza">Larghezza</label>
        <input type="text" name="larghezza" id="larghezza"/>
        <br>
        <label for="altezza">Altezza</label>
        <input type="text" name="altezza" id="altezza"/> 
        <label for="via">Profondit&agrave;</label>
        <input type="text" name="profondita" id="profondita"/> 
        <label for="via">Peso;</label>
        <input type="text" name="peso" id="peso"/> 
        <br/>
        <button type="submit" value="destinatario">Spedisci</button>
    </form>
</div>
