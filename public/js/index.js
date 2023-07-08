const $$button = document.querySelectorAll(".js-button")

const handleClickButton = () => {
  alert("Clicked!")
}

Array.from($$button).forEach($button => {
  $button.addEventListener("click", handleClickButton)
})
function AddItem(cnt) {  
  const ticketList = document.getElementById('ticket-list'+cnt);
  const newItemIndex = cnt+"-"+ticketList.childElementCount + 1;
  
  const newItem = document.createElement('div');
  newItem.classList.add('d-flex', 'mb-2');
  newItem.innerHTML = `
    <div>
      <input class="form-check-input" type="checkbox" value="" id="chkName${newItemIndex}" onchange="SetLineThrough('Name${newItemIndex}')">
      <label class="form-check-label" id="lblName${newItemIndex}" for="chkName${newItemIndex}">
        Item-${newItemIndex}
      </label>
    </div>
    <div class="ms-auto"><i class="bi bi-x" onclick="DelItem(this)"></i></div>
  `;

  ticketList.appendChild(newItem);
}

function DelItem(element) {
  const item = element.parentNode.parentNode;
  item.remove();
}
function CreateTicket() {
  let cnt = $('#cntTicket').val();
  cnt ++ ;
  const txtTicketPNm = $("#txtTicketPNm").val();
  if (txtTicketPNm == "") {
    alert("Please enter ticket name");
    $("#txtTicketPNm").focus();
  }
  else {
    let tbl = document.getElementById("ticket-parent");
    tbl.insertAdjacentHTML(
        "beforeend",
        '<div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6 mb-2">' +
						'<div class="bg-danger text-white d-flex p-2">' +
							'<span class="fw-bold">' + txtTicketPNm + '</span>' +
							'<span class="ms-auto"><i class="bi bi-plus-lg" onclick="AddItem('+cnt+')"></i></span>' +
						'</div>' +
						'<div id="ticket-list' +cnt + '" class="ticket-child p-2 bg-white overflow-y-auto scroll-height">' +
						'</div>' +
					'</div>'
      );
      $("#txtTicketPNm").val("");      
      $('#cntTicket').val(cnt);
  }
}

function SetLineThrough(id) {
  const chk = $("#chk" + id);
  if (chk.is(":checked")) $("#lbl" + id).addClass("text-decoration-line-through");
  else $("#lbl" + id).removeClass("text-decoration-line-through");
}

const parentItems = document.querySelectorAll('.parent');

parentItems.forEach((item) => {
  item.addEventListener('click', function() {
    const icon = this.querySelector('span');
    icon.classList.toggle('rotate-icon');
  });
});