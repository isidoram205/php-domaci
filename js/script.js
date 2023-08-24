$("#delete").click(function () {
    const checked = $("input[type=radio]:checked");
    request = $.ajax({
      url: "delete.php",
      type: "POST",
      data: { id: checked.val() },
    });
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        checked.closest("tr").remove();
      } 
    });
  });
  
  function addItem(id){
    event.preventDefault();
    itemname = $("input[name='name']").val();
    itempur = $("input[name='purpose']").val();
    itemdate= $("input[name='date']").val();
    if (itemname.trim() === '' || itempur.trim() === '' || itemdate.trim() === '') {
      alert("Morate popuniti sva polja!");
      return; 
    }
  
  
    $.ajax({
      url: "addItem.php",
      type: "POST",
      data: {id: id, name: itemname, purpose: itempur, date: itemdate},
      success: function(response) {
         alert("Uspešno dodat lek!");
         $("input[name='name']").val('');
         $("input[name='purpose']").val('');
         $("input[name='date']").val('');
      },
      error: function(xhr, status, error) {
          console.error(xhr);
      }
  });
  
  }
  
  function updateUser(id) {
    event.preventDefault();
    usrname = $("input[name='username']").val();
    usrpass = $("input[name='password']").val();
    usremail = $("input[name='email']").val();
    if (usrname.trim() === '' || usrpass.trim() === '' || usremail.trim() === '') {
      alert("Morate popuniti sva polja!");
      return; 
    }
  
    $.ajax({
      type: "POST",
      url: "check.php",
      data: {
        name: usrname
      },
      success: function(response) {
      if (response === "Failed") {
        alert("Korisničko ime već postoji u bazi podataka!");
      } else {
    $.ajax({
        url: "updateUser.php",
        type: "POST",
        data: {id: id, name: usrname, pass: usrpass, email: usremail},
        success: function(response) {
           alert("Podaci su uspešno izmenjeni!");
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    }); }}});
  }
  
  function sortTableByDate() {
    var table = document.getElementById("planner-table");
    var rows = table.rows;
    var switching = true;
  
    while (switching) {
      switching = false;
      for (var i = 1; i < rows.length - 1; i++) {
        var row1 = rows[i].getElementsByTagName("td")[2];
        var row2 = rows[i + 1].getElementsByTagName("td")[2];
        if (new Date(row1.innerHTML) > new Date(row2.innerHTML)) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }
  }
  
  function search() {
    var input, filter, table, tr, i, td1, td2, txtValue1, txtValue2;
    input = document.getElementById("input");
    filter = input.value.toUpperCase();
    table = document.getElementById("planner-table");
    tr = table.getElementsByTagName("tr");
  
    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[1];
  
  
        if (td1 || td2  ) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
  
            if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
  }