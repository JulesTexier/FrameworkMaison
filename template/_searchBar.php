<form action="http://coolagenda.local/?page=search" method="post">
    <!-- Grid -->
    <div class="grid">
      <!-- Markup example 1: input is inside label -->
      <label for="search">
        Nom       
        <input width="900px" type="text" id="search" name="search" placeholder="search">
      </label>
      <label for="date">
        Date
        <input type="string" id="date" name="date" placeholder="Date">
      </label>
      <fieldset>
        <legend>Important</legend>
        <input type="radio" id="important" name="important" value=1>
        Oui
      </fieldset>
      <button type="submit">Rechercher</button>
    </div>  
    <!-- Button -->
  </form>