$(()=>{
    $("form").submit((e)=> {
      e.preventDefault();
      let $form = $(this);
      $.post($form.attr("action"), $form.serialize())
      .done((data)=> {
        $("#html").html(data);
        $("#formulaire").modal("hide"); 
      })
      .fail(()=> {
        alert("ca marche pas...");
      });
    });
    $('.report').one('click', (e)=> {
      e.preventDefault();     
      let button = $(e.currentTarget);        
      let url = "indexForum.php?action=incrementAlert&id=" + button.attr('id');

      $.getJSON(url)
      .done((data)=>{
          if(data.alerts === 'ok') {
              button.css( "color", "red" );
          } else {
              console.log(data.alerts);
          }           
      });
  });

  });
  
  