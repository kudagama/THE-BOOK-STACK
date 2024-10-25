window.onscroll = function () {
  scrollFunction();
};

window.addEventListener("load", function () {
  document.querySelector(".loder").classList.add("hidden");
});

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.animationName = "headerScrollUp";
    document.getElementById("navbar").style.animationDuration = "2s";
    // document.getElementById("navbar").style.animationFillMode = "forwards";

    document.getElementById("animation3").style.animationName = "animate3";
    document.getElementById("animation3").style.animationDuration = "3s";
    document.getElementById("animation3").style.animationFillMode = "forwards";

    document.getElementById("animation4").style.animationName = "animate4";
    document.getElementById("animation4").style.animationDuration = "6s";
    document.getElementById("animation4").style.animationFillMode = "forwards";

    var projects = setInterval(projectDone, 50);
    var clients = setInterval(happyClients, 1);
    var awards = setInterval(ourAwards, 40);
    var experience = setInterval(ourExperience, 10);

    let count1 = 1;
    let count2 = 1;
    let count3 = 1;
    let count4 = 1;

    function projectDone() {
      count1++;
      document.getElementById("value1").innerHTML =
        count1 + '<i class="bi bi-plus fs-1" style="color: #f35444;"></i>';
      //stop at given condition
      if (count1 == 200) {
        clearInterval(projects);
      }
    }

    function happyClients() {
      count2++;
      document.getElementById("value2").innerHTML =
        count2 + '<i class="bi bi-plus fs-1" style="color: #f35444;"></i>';
      //stop at given condition
      if (count2 == 650) {
        clearInterval(clients);
      }
    }

    function ourAwards() {
      count3++;
      document.getElementById("value3").innerHTML =
        count3 + '<i class="bi bi-plus fs-1" style="color: #f35444;"></i>';
      //stop at given condition
      if (count3 == 500) {
        clearInterval(awards);
      }
    }

    function ourExperience() {
      count4++;
      document.getElementById("value4").innerHTML =
        count4 + '<i class="bi bi-plus fs-1" style="color: #f35444;"></i>';
      //stop at given condition
      if (count4 == 120) {
        clearInterval(experience);
      }
    }

    document.getElementById("searchScroll1").style.position = "fixed";
    document.getElementById("searchScroll1").style.top = "40px";
  } else {
    document.getElementById("navbar").style.animationName = "";
    // document.getElementById("animation3").style.animationName = "";
    // document.getElementById("navbar").style.animationDuration = "2s";
    // document.getElementById("navbar").style.animationFillMode = "forwards";
  }
}

function dash() {
  // document.getElementById("searchScroll1").className = "d-none"

  var searchScroll1 = document.getElementById("navbarTogglerDemo02");

  searchScroll1.classList.toggle("d-none");
}

var landModel;
function sellersignUpModel() {
  var viewModel = document.getElementById("lm");
  landModel = new bootstrap.Modal(viewModel);
  landModel.show();
}
var landModel2;
function sellersigninModel() {
  var viewModel = document.getElementById("lm2");
  landModel2 = new bootstrap.Modal(viewModel);
  landModel.hide();
  landModel2.show();
}
function sellersignUp() {

  var fn = document.getElementById("fn");
  var ln = document.getElementById("ln");
  var en = document.getElementById("en");
  var pn = document.getElementById("pn");
  var mn = document.getElementById("mn");
  var gn = document.getElementById("gn");

         
  
  var form = new FormData();

  form.append("fn", fn.value);
  form.append("ln", ln.value);
  form.append("en", en.value);
  form.append("pn", pn.value);
  form.append("mn", mn.value);
  form.append("gn", gn.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "Success") {
        sellersigninModel();
      } else {
        document.getElementById("msgs").innerHTML = text;
        document.getElementById("msgdivs").className = "d-block";
      }
    }
  };

  request.open("POST", "sellersignupprocess.php", true);
  request.send(form);
}

function sellersignIn() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Success") {
        window.location = "seller.php";
      } else {
        document.getElementById("msg2").innerHTML = text;
      }
    }
  };

  request.open("POST", "sellersignInProcess.php", true);
  request.send(f);
}

var bm;
function sellerforgotPassword() {
  var email = document.getElementById("email2");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "Success") {
        alert(
          "Verification code has sent to your email. Please check your inbox"
        );
        var m = document.getElementById("sellerforgotPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        alert(text);
      }
    }
  };

  request.open("GET", "sellerforgotPasswordProcess.php?e=" + email.value, true);
  request.send();
}

function sellershowPassword() {
  var i = document.getElementById("npi");
  var eye = document.getElementById("e1");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function sellerreTypePasswordShow() {
  var i = document.getElementById("rtpi");
  var eye = document.getElementById("e2");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function sellerresetpw() {
  var email = document.getElementById("email2");
  var np = document.getElementById("npi");
  var rtp = document.getElementById("rtpi");
  var vcode = document.getElementById("vc");

  var p = document.getElementById("password2");

  var form = new FormData();
  form.append("e", email.value);
  form.append("p", np.value);
  form.append("r", rtp.value);
  form.append("v", vcode.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Success") {
        bm.hide();
        alert("Password reset Success.");
        signinModel.show();
      } else {
        alert(text);
      }
    }
  };

  request.open("POST", "sellerresetPassword.php", true);
  request.send(form);
}

function signout() {

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if ((text = "Success")) {
        window.location = "index.php";
      } else {
        alert(text);
      }
    }
  };

  request.open("GET", "signoutProcess.php", true);
  request.send();
}

var landModel3;
function adminloginmodel() {
  var viewModel = document.getElementById("lm3");
  landModel3 = new bootstrap.Modal(viewModel);
  landModel3.show();
}
function adminsignIn() {
  var email = document.getElementById("email3");
  var password = document.getElementById("password3");
  var rememberme = document.getElementById("rememberme2");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Success") {
        window.location = "adminpanel.php";
      } else {
        document.getElementById("msg3").innerHTML = text;
      }
    }
  };

  request.open("POST", "adminsignInProcess.php", true);
  request.send(f);
}
var bm;
function adminforgotPassword() {
  var email = document.getElementById("email3");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "Success") {
        alert(
          "Verification code has sent to your email. Please check your inbox"
        );
        var m = document.getElementById("adminforgotPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        alert(text);
      }
    }
  };

  request.open("GET", "adminforgotPasswordProcess.php?e=" + email.value, true);
  request.send();
}
function adminresetpw() {
  var email = document.getElementById("email3");
  var np = document.getElementById("npi1");
  var rtp = document.getElementById("rtpi1");
  var vcode = document.getElementById("vc1");

  var p = document.getElementById("password3");

  var form = new FormData();
  form.append("e", email.value);
  form.append("p", np.value);
  form.append("r", rtp.value);
  form.append("v", vcode.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Success") {
        bm.hide();
        alert("Password reset Success.");
        signinModel.show();
      } else {
        alert(text);
      }
    }
  };

  request.open("POST", "adminforgotPassword.php", true);
  request.send(form);
}
function adminshowPassword() {
  var i = document.getElementById("npi1");
  var eye = document.getElementById("e3");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function adminreTypePasswordShow() {
  var i = document.getElementById("rtpi1");
  var eye = document.getElementById("e4");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

var landModel4;
function customersignupmodel() {
  var viewModel = document.getElementById("lm4");
  landModel4 = new bootstrap.Modal(viewModel);
  landModel4.show();
}
var landModel5;
function customersigninModel() {
  var viewModel = document.getElementById("stsign");
  landModel5 = new bootstrap.Modal(viewModel);

  landModel5.show();
  landModel4.hide();
}
function customersignUp() {
  var f = document.getElementById("f");
  var l = document.getElementById("l");
  var e = document.getElementById("e");
  var p = document.getElementById("p");
  var m = document.getElementById("m");
  var g = document.getElementById("g");
 
  

  var form = new FormData();

  form.append("f", f.value);
  form.append("l", l.value);
  form.append("e", e.value);
  form.append("p", p.value);
  form.append("m", m.value);
  form.append("g", g.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "Success") {
        customersigninModel();
      } else {
        document.getElementById("msg").innerHTML = text;
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };

  request.open("POST", "customersignupprocess.php", true);
  request.send(form);
}

var bm;
function customerforgotPassword() {
  var email = document.getElementById("semail");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "Success") {
        alert(
          "Verification code has sent to your email. Please check your inbox"
        );
        var m = document.getElementById("customerforgotPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        alert(text);
      }
    }
  };

  request.open(
    "GET",
    "customerforgotPasswordProcess.php?e=" + email.value,
    true
  );
  request.send();
}
function customerresetpw() {
  var email = document.getElementById("semail");
  var np = document.getElementById("npi3");
  var rtp = document.getElementById("rtpi3");
  var vcode = document.getElementById("vc3");

  var p = document.getElementById("password");

  var form = new FormData();
  form.append("e", email.value);
  form.append("p", np.value);
  form.append("r", rtp.value);
  form.append("v", vcode.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Success") {
        bm.hide();
        alert("Password reset Success.");
        signinModel.show();
      } else {
        alert(text);
      }
    }
  };

  request.open("POST", "customerforgotPassword.php", true);
  request.send(form);
}
function customershowPassword() {
  var i = document.getElementById("npi3");
  var eye = document.getElementById("e5");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function customerreTypePasswordShow() {
  var i = document.getElementById("rtpi3");
  var eye = document.getElementById("e6");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function customersignIn() {
  var email = document.getElementById("semail");
  var password = document.getElementById("spassword");
  var rememberme = document.getElementById("srememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Success") {
        window.location = "customerpanel.php";
      } else {
        document.getElementById("smsg").innerHTML = text;
      }
    }
  };

  request.open("POST", "customersignInProcess.php", true);
  request.send(f);
}



function addHostels() {
  window.location = "addHostels.php";
}



var landModel10;
function viewBookings() {
  var viewModel = document.getElementById("viewBooking");
  landModel10 = new bootstrap.Modal(viewModel);
  landModel10.show();
}


function changeImage() {
  var img = document.getElementById("imageuploader");

  img.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);

    document.getElementById("i0").src = url;
  };
}

function addHostel() {
  var price = document.getElementById("price");
  var description = document.getElementById("desc");
  var image = document.getElementById("imageuploader");

  var f = new FormData();
  f.append("pr", price.value);
  f.append("des", description.value);
  f.append("pName", pName);
  f.append("lati", lati);
  f.append("longi", longi);

  f.append("image", image.files[0]);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Hostel image saved successfully") {
        pName = null;
        lati = null;
        longi = null;
        alert("Successfully added post.");
        window.location.reload();
      } else {
        alert(text);
      }
    }
  };

  request.open("POST", "addhostelProcess.php", true);
  request.send(f);
}

function updateHostel(id) {
  var price = document.getElementById("price");
  var description = document.getElementById("desc");
  var image = document.getElementById("imageuploader");
  var pName1 = document.getElementById("p").value;
  var lati1 = document.getElementById("la").value;
  var longi1 = document.getElementById("lo").value;

  var f = new FormData();
  f.append("id", id);
  f.append("pr", price.value);
  f.append("des", description.value);
  f.append("pName", pName1);
  f.append("lati", lati1);
  f.append("longi", longi1);

  f.append("image", image.files[0]);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "Hostel image saved successfully") {
        alert("Updated");
        window.location.reload();
      } else {
        alert(text);
      }
    }
  };

  request.open("POST", "updatehostelProcess.php", true);
  request.send(f);
}

function deletePost(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "Success") {
        window.location.reload();
      } else {
        alert(text);
      }
    }
  };

  request.open("GET", "deletePostProcess.php?id=" + id, true);
  request.send();
}

function addProduct() {
  
  var category = document.getElementById("category");
  var brand = document.getElementById("Author");
  var model = document.getElementById("language");
  var title = document.getElementById("title");

 
  var qty = document.getElementById("qty");
  var cost = document.getElementById("cost");
  var dwc = document.getElementById("dwc");
  var doc = document.getElementById("doc");
  var desc = document.getElementById("desc");
  var image = document.getElementById("imageuploader");

  // alert(
  //   "Category: " + category + "\n" +
  //   "Brand: " + brand + "\n" +
  //   "Model: " + model + "\n" +
  //   "Title: " + title + "\n" +
  //   "Quantity: " + qty + "\n" +
  //   "Cost: " + cost + "\n" +
  //   "DWC: " + dwc + "\n" +
  //   "DOC: " + doc + "\n" +
  //   "Description: " + desc + "\n" +
  //   "Image: " + image
  // );

  var f = new FormData();
  f.append("ca", category.value);
  f.append("b", brand.value);
  f.append("m", model.value);
  f.append("t", title.value);
  f.append("qty", qty.value);
  f.append("cost", cost.value);
  f.append("dwc", dwc.value);
  f.append("doc", doc.value);
  f.append("desc", desc.value);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
      f.append("image" + x, image.files[x]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4) {
          var text = request.responseText;

          if (text == "Product image saved successfully") {
              window.location.reload();
          } else {
              alert(text);

          }

      }
  }

  request.open("POST", "selleraddbookprocess.php", true);
  request.send(f);

}

function changeProductImage() {
  var image = document.getElementById("imageuploader");

  image.onchange = function () {

      var file_count = image.files.length;

      if (file_count <= 3) {

          for (var x = 0; x < file_count; x++) {
              var file = this.files[x];
              var url = window.URL.createObjectURL(file);

              document.getElementById("i" + x).src = url;
          }

      } else {
          alert("Please select 3 or less than 3 images.");
      }

  }
}
var cm;
function addToCart(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;

            document.getElementById("viewCart").innerHTML = text;

            var viewCartModel = document.getElementById("viewCart");
            cm = new bootstrap.Modal(viewCartModel);
            cm.show();
        }
    }

    request.open("GET", "addToCartProcess.php?id=" + id, true);
    request.send();
}
function deleteFromCart(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4) {
          var text = request.responseText;
          if (text == "Success") {
              alert("Product removed from cart");
              window.location.reload();
          } else {
              alert(text);
          }

      }
  }

  request.open("GET", "deleteFromCartProcess.php?id=" + id, true);
  request.send();
}
function basicSearch(x) {

  var txt = document.getElementById("basic_search_txt");
  var select = document.getElementById("basic_search_select");

  var form = new FormData();
  form.append("t", txt.value);
  form.append("s", select.value);
  form.append("page", x);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4) {
          var text = request.responseText;
          document.getElementById("basicSearchResult").innerHTML = text;
      }
  }

  request.open("POST", "basicSearchProcess.php", true);
  request.send(form);

}
function cartSearch() {
  var txt = document.getElementById("search").value;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4) {
          var text = request.responseText;
          if (text == "no") {
             
          } else {
              document.getElementById("view").innerHTML = text;
          }

      }
  }

  request.open("GET", "cartSearchProcess.php?t=" + txt, true);
  request.send();
}
function changeImage() {

  var view = document.getElementById("viewImg");
  var file = document.getElementById("profileimg");

  file.onchange = function () {
      var file1 = this.files[0];
      var url = window.URL.createObjectURL(file1);

      view.src = url;
  }

}

function updateProfile() {

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var image = document.getElementById("profileimg");

  var form = new FormData();
  form.append("fn", fname.value);
  form.append("ln", lname.value);
  form.append("m", mobile.value);
  form.append("l1", line1.value);
  form.append("l2", line2.value);
  form.append("p", province.value);
  form.append("d", district.value);
  form.append("c", city.value);
  form.append("pc", pcode.value);

  if (image.files.length == 0) {

      var confirmation = confirm("Are you sure You don't want to update Profile Image?");

      if (confirmation) {
          alert("You have not selected any image ");
      }

  } else {
      form.append("image", image.files[0]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4) {
          var text = request.responseText;


          if (text == "Success") {
              window.location = "customerpanel.php";
          } else {
              alert(text);
          }

      }
  }

  request.open("POST", "updateProfileProcess.php", true);
  request.send(form);

}
function payNow(id) {

  var qty = document.getElementById("qty_input").value;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4) {
          var text = request.responseText;
          var obj = JSON.parse(text);
         
          var mail = obj["mail"];
          var amount = obj["amount"];
          var hash = obj["hash"];
          if (text == "1") {
              alert("Please log in or sign up");
              window.location = "index.php";
          } else if (text == "2") {
              alert("Please update your profile first");
              window.location = "userProfile.php";
          } else {
                         
              // Payment completed. It can be a successful failure.
              payhere.onCompleted = function onCompleted(orderId) {

                  console.log("Payment completed. OrderID:" + orderId);

                  saveInvoice(orderId, id, mail, amount, qty);
                  // Note: validate the payment and show success or failure page to the customer
              };

              // Payment window closed
              payhere.onDismissed = function onDismissed() {
                  // Note: Prompt user to pay again or show an error page
                  console.log("Payment dismissed");
              };

              // Error occurred
              payhere.onError = function onError(error) {
                  // Note: show an error page
                  console.log("Error:" + error);
              };

              // Put the payment variables here
              var payment = {
                  "sandbox": true,
                  "merchant_id": "1227477",    // Replace your Merchant ID
                  merchant_secret:
          "MzQ5NTc4MTUwNzc2NDcxNzU5MDM3NzkyMDUzMTMxMDIzOTQzMjE0", // Replace your Mechant secret
                  "return_url": "http://localhost/eshop/singleProductView.php?id" + id,     // Important
                  "cancel_url": "http://localhost/eshop/singleProductView.php?id" + id,     // Important
                  "notify_url": "http://sample.com/notify",
                  "order_id": obj["id"],
                  "items": obj["item"],
                  "amount": amount,
                  "currency": "LKR",
                  hash: obj["hash"],
                  "first_name": obj["fname"],
                  "last_name": obj["lname"],
                  "email": mail,
                  "phone": obj["mobile"],
                  "address": obj["address"],
                  "city": obj["city"],
                  "country": "Sri Lanka",
                  "delivery_address": obj["address"],
                  "delivery_city": obj["city"],
                  "delivery_country": "Sri Lanka",
                  "custom_1": "",
                  "custom_2": ""
              };

              // Show the payhere.js popup, when "PayHere Pay" is clicked
              // document.getElementById('payhere-payment').onclick = function (e) {
              payhere.startPayment(payment);
              // };

          }

      }
  }

  request.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
  request.send();
}

function saveInvoice(orderId, id, mail, amount, qty) {

  var form = new FormData();
  form.append("o", orderId);
  form.append("i", id);
  form.append("m", mail);
  form.append("a", amount);
  form.append("q", qty);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4) {
          var text = request.responseText;
          if (text == "1") {
              window.location = "invoice.php?id=" + orderId;
          } else {
              alert(text);
          }
      }
  }

  request.open("POST", "saveInvoice.php", true);
  request.send(form);

}
function printInvoice() {
  var body = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = body;
}
function addToWatchlist(id) {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
      if (r.readyState == 4) {
          var t = r.responseText;
          if (t == "added") {
              document.getElementById("heart" + id).style.className = "text-danger";
              window.location.reload();
          } else if (t == "removed") {
              document.getElementById("heart" + id).style.className = "text-dark";
              window.location.reload();
          } else {
              alert(t);
          }
      }
  }

  r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
  r.send();

}

function removeFromWatchlist(id){
  var r = new XMLHttpRequest();

  r.onreadystatechange = function (){
      if(r.readyState == 4){
          var t = r.responseText;
          if(t == "success"){
              window.location.reload();
          }else{
              alert (t);
          }
          
      }
  }

  r.open("GET","removeWatchlistProcess.php?id="+id,true);
  r.send();
}