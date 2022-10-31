<div class="container">
  <h1>Ajouter une date</h1>
  <form action="http://coolagenda.local/?page=save" method="post">
    <!-- Grid -->
    <div class="grid">
      <!-- Markup example 1: input is inside label -->
      <label for="dateTitle">
        Titre
        <input type="text" id="dateTitle" name="dateTitle" placeholder="Titre" required>
      </label>
      <label for="date">
        Date (format : dd-mm-yyyy)
        <input type="string" id="date" name="date" placeholder="Date" required>
      </label>
    </div>
    <div class="grid">
      <label for="details">
        Détails
        <textarea type="text" id="details" name="details" placeholder="Détails" required></textarea>
      </label>
      <fieldset>
        <legend>Important</legend>
        <label for="small">
          <input type="radio" id="important" name="important" value=1 checked>
          Oui
        </label>
        <label for="medium">
          <input type="radio" id="important" name="important" value=0>
          Non
        </label>
    </fieldset>
    </div>
    <!-- Button -->
    <button type="submit">Submit</button>
  </form>
</div>