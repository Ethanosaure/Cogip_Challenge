<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
<?php session_start();?>
</head>
<body>
<section class="section">
<header class="header__side">
    <div class="header__side__header">
        <img class="header__side__header__img" src="../public/assets/img/img_contact.svg">
        <p><?php echo  $_SESSION['user_firstname']; ?></p>
        <p class="header__side__header__p"><?php echo  $_SESSION['user_lastname']; ?></p>
    </div>
    <section class="dashboard__side">
        <div class="dashboard__side__nav">        
                <nav>
                    <ul>
                        <li class="dashboard__side__nav__dashboard"><img src="../public/assets/img/Icon_dashboard.svg"><a onclick="showDiv()" class ="dashboard__side__nav__dashboard__a" >Dashboard</a></li>
                        <li class="dashboard__side__nav__invoice"><img src="../public/assets/img/Icon_Invoices.svg"><a onclick="showDiv()" class="dashboard__side__nav__invoices__a" >Invoices</a></li>
                        <li class="dashboard__side__nav__company"><img src="../public/assets/img/Icon_Companies.svg"><a onclick="showDiv()" class="dashboard__side__nav__company__a" >Companies</a></li>
                        <li class="dashboard__side__nav__contact"><img src="../public/assets/img/Icon_contact.svg"><a onclick="showDiv()" class="dashboard__side__nav__contact__a" >Contacts</a></li>
                    </ul>
                </nav>
    </div>
    <div class="dashboard__side__logout">
            <img src="../public/assets/img/img_contact.svg">
            <a href="logout">Logout</a>
    </div>
    </section>
</header>
<main>
    <div class="dashboard__head">
      <div class="dashboard__head__title">
        <h1>Dashboard</h1>
        <p>dashboard/</p>
        </div>

    <div class="dashboard__head__info">
        <div class="dashboard__head__info__user">
        <h2>Welcome back <?php echo $_SESSION['user_firstname']; ?>!</h2>
        <p>You can here add an invoice, a company and some contacts</p>
        </div>
        <img class="dashboard__head__info__img" src="../public/assets/img/img_dashboard.svg" alt="dashboard image">
    </div>
  </div>



        <article class="container">
            <section class="container__1">
            <section class="container__statistics">
                <h3>Statistics</h3>
                <div class="container__statistics__divs">
                <div class="container__statistics__divs__1">promis</div>
                <div class="container__statistics__divs__2">y a des</div>
                <div class="container__statistics__divs__3">trucs</div>
            </section>
             <section class="container__contacts">
            
                <div class="container__contacts__title">
                <h3>Last contacts</h3>
                </div>
                    <form method="POST" action="dashboard">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Mail</th>
                        </tr>
                        <?php foreach ($contacts as $contact):  ?>
                        <tr onclick='SaveBtnContact(this, "<?php echo $contact["id"] ?>")'>     
                            <td onclick='ContactName(this, "<?php echo $contact["id"] ?>")' ><?php echo $contact['name']; ?></td>
                            <td onclick='ContactPhone(this, "<?php echo $contact["id"] ?>")' ><?php echo $contact['phone']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                        </tr>           
                        <?php endforeach; ?>
                    </table>
                    </form>
            </section>

            
            </section>
<section class="container__2">
    <section class="container__invoices">
                <div class="container__invoices__title">
                <h3>Last invoices</h3>
                </div>
                    <form method="POST" action="dashboard">
                    <table>
                        <tr>
                            <th>Invoice number</th>
                            <th>Dates due</th>
                            <th>Name</th>
                        </tr>
                        <?php foreach ($invoices as $invoice): ?>

                            <tr onclick='SaveBtnInvoice(this, "<?php echo $invoice["id"] ?>")'>
                            
                                <td onclick='InvoiceIdCompany(this, "<?php echo $invoice["id"] ?>")' ><?php echo $invoice['id_company']; ?></td>
                                <td><?php echo $invoice['created_at']; ?></td>
                                <td onclick='InvoiceName(this, "<?php echo $invoice["id"] ?>")'><?php echo $invoice['name']; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </table>    
                    </form>
            </section>
           
            <section class="container__company">
                <div class="container__company__title">
                <h3>Last company</h3>
                </div>
                    <form method="POST" action="dashboard">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>TVA</th>   
                            <th>Country</th>
                        </tr>
                        <?php foreach ($companies as $company):  ?>

                        <tr onclick='SaveBtnCompany(this, "<?php echo $company["id"] ?>")'>  
                            
                            <td onclick='CompanyName(this, "<?php echo $company["id"] ?>")' ><?php echo $company['name']; ?></td>
                            <td><?php echo $company['tva']; ?></td>
                            <td><?php echo $company['country']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    </form>        
                
            </section>
            </section>
        </article>
        <section class="formulaire__contact">
        <!-- fonction add Contacts -->
        <h3 class="formulaire__contact__title">New contact</h3>
<form method="POST" action="dashboard">
        <input name="contactName" type="text" value="" placeholder="Contact Name" required>
        <input name="contactPhone" type="text" value="" placeholder="Contact Phone" required>
        <input name="contactMail" value="" placeholder="Contact Mail" type="email" required>
        <input name="contactCompanyId" value="" placeholder="Contact Company" type="number" required>
    <input type="hidden" name="contactSpam" class="spam" value="">

    <button type="submit" name="validationContact">Save</button>
</form>
</section >
<section class="formulaire__company">
        <!-- fonction add Companies -->
        <h3 class="formulaire__company__title">New company</h3>
<form method="POST" action="dashboard">
        <input name="companyName" type="text" value=""  placeholder="Company Name" required >
        <input name="companyType" type="number" value="" placeholder="Company type" required>
        <input name="companyCountry" type="text" value="" placeholder="Company Country" required>
        <input name="companyTVA" type="text" value="" placeholder="Company TVA" required>
        <input type="hidden" name="companySpam" class="spam" value="">

        <button type="submit" name="validationCompany">Save</button>
</form>
</section>
<section class ="formulaire__invoices">
    <!-- fonction add invoices -->
    <h3 class="formulaire__invoices__title">New invoice</h3>
<form method="POST" action="dashboard">
        <input name="invoiceNumber" type="text" value="" placeholder="Invoice Number" required>
        <input name="invoiceName" type="text" value="" placeholder="Invoice Name" required>
        <input type="hidden" name="invoiceSpam" class="spam" value="">

        <button type="submit" name="validationInvoice">Save</button>
</form>
</section>

        </main>
</section>
</body>
</html>
  <script>
        let SaveBtn;
        let DelBtn;
    function createDeleteBtn(line){
        let existingBtn = line.querySelector('.DeleteBtn');
        if(!existingBtn){
        DelBtn = document.createElement('button');
        DelBtn.type = 'submit';
        DelBtn.innerText = 'Delete';
        DelBtn.className = 'DeleteBtn';
        line.appendChild(DelBtn);
        }
}
    function createSaveBtn(line){
        createDeleteBtn(line);
        let existingBtn = line.querySelector('.saveBtn');
        if(!existingBtn){
        SaveBtn = document.createElement('button');
        SaveBtn.type = 'submit';
        SaveBtn.innerText = 'Save';
        SaveBtn.className = 'saveBtn';
        line.appendChild(SaveBtn);
        }
        
}  
function SaveBtnInvoice(line, id){
    createSaveBtn(line);
    SaveBtn.name = 'editInvoice';
    SaveBtn.value = id;
    DelBtn.name = "deleteInvoice";
    DelBtn.value = id;
}
function SaveBtnCompany(line, id){
    createSaveBtn(line);
    SaveBtn.name = 'editCompany';
    SaveBtn.value = id;
    DelBtn.name = "deleteCompany";
    DelBtn.value = id;
}
function SaveBtnContact(line, id){
    createSaveBtn(line);
    SaveBtn.name = "editContact";
    SaveBtn.value = id;
    DelBtn.name ="deleteContact";
    DelBtn.value = id;
}
function DeleteInvoice(line, id){
    createDeleteBtn(line);
    SaveBtn.name = "deleteInvoice";
    SaveBtn.value = id;
}
let input;
function createInputCell(cell){
    let content = cell.innerText;
    input = document.createElement('input');
    input.type='text';
    input.value=content;
    cell.innerText = '';
    cell.appendChild(input);
    input.focus();
    

}
function InvoiceName(cell, id){
    createInputCell(cell);
    input.name= "invoiceName[" + id + "]";
    console.log(input.name);
    input.addEventListener('keydown', (event) =>{
    if(event.keyCode == 13){
    cell.innerText = input.value;
    console.log(cell.innerText);  
    }
    });
    input.addEventListener('blur', ()=>{
        cell.innertext = input.value;
        console.log(cell.innerText);
    });
}
function InvoiceIdCompany(cell, id){
    createInputCell(cell);
    input.setAttribute('invoice-id',id);
    input.name= "id_company["+ id + "]";
    console.log(id);
    input.addEventListener('keydown', (event) =>{
    if(event.keyCode == 13){
    input.blur();
    cell.innerText = input.value;
    }
    });
    input.addEventListener('blur', ()=>{
        cell.innertext = input.value;
    });
}
function CompanyName(cell, id){
    createInputCell(cell);
    input.setAttribute('Company-id', id);
    input.name = "companyName["+ id + "]";
    input.addEventListener('keydown', (event) =>{
    if(event.keyCode == 13){
    cell.innerText = input.value;
    console.log(input.value);  
    }
    });
    input.addEventListener('blur', ()=>{
        cell.innertext = input.value;
        console.log(input.value);
    });
}
function ContactName(cell, id){
    createInputCell(cell);
    input.setAttribute('Contact-id', id);
    input.name = "contactName["+ id + "]";
    input.addEventListener('keydown', (event) =>{
    if(event.keyCode == 13){
    cell.innerText = input.value;
    console.log(input.value);  
    }
    });
    input.addEventListener('blur', ()=>{
        cell.innertext = input.value;
        console.log(input.value);
    });
}
function ContactPhone(cell, id){
    createInputCell(cell);
    input.setAttribute('Company-id', id);
    input.name = "contactPhone["+ id + "]";
    input.addEventListener('keydown', (event) =>{
    if(event.keyCode == 13){
    cell.innerText = input.value;
    console.log(input.value);  
    }
    });
    input.addEventListener('blur', ()=>{
        cell.innertext = input.value;
        console.log(input.value);
    });
}
function showDiv (){
    let dashboard = document.querySelector('.dashboard__side__nav__dashboard__a');
    let invoices = document.querySelector('.dashboard__side__nav__invoices__a');
    let company = document.querySelector('.dashboard__side__nav__company__a');
    let contacts =document.querySelector('.dashboard__side__nav__contact__a');

    let dashboardDiv = document.querySelector('.container');
    let invoicesDiv = document.querySelector('.formulaire__invoices');
    let companyDiv = document.querySelector('.formulaire__company');
    let contactsDiv = document.querySelector('.formulaire__contact');

    dashboard.addEventListener('click', () => {
        dashboardDiv.style.display ='flex';
        invoicesDiv.style.display = 'none';
        companyDiv.style.display = 'none';
        contactsDiv.style.display = 'none';
        console.log("dashboard clicked");
    });
    invoices.addEventListener('click', () => {
        dashboardDiv.style.display = 'none';
        invoicesDiv.style.display = 'flex';
        companyDiv.style.display = 'none';
        contactsDiv.style.display = 'none';
        console.log("dashboard clicked");
    });
    company.addEventListener('click', () => {
        dashboardDiv.style.display = 'none';
        invoicesDiv.style.display = 'none';
        companyDiv.style.display = 'flex';
        contactsDiv.style.display = 'none';
        console.log("dashboard clicked");
    });
    contacts.addEventListener('click', () => {
        dashboardDiv.style.display = 'none';
        invoicesDiv.style.display = 'none';
        companyDiv.style.display = 'none';
        contactsDiv.style.display = 'flex';
        console.log("dashboard clicked");
    });
}
</script>

        
            
        

 
 
 <?php
 
// if($_SERVER['REQUEST_METHOD'] === 'POST'){
//     $contactSpam1 = $_POST['spam1'];
//     $contactName = $_POST['contactName'];
//     $contactPhone = $_POST['contactPhone'];
//     $contactMail = $_POST['contactMail'];
//     $contactCompanyId = $_POST['contactCompanyId'];
//     $sanitizedContactName = htmlspecialchars($contactName, ENT_QUOTES, 'UTF-8');
//     $sanitizedContactPhone = htmlspecialchars($contactPhone, ENT_QUOTES, 'UTF-8');
//     $sanitizedContactMail = htmlspecialchars($contactMail, FILTER_SANITIZE_MAIL);
//     $sanitizedContactCompanyId = htmlspecialchars($contactCompanyId, ENT_QUOTES, 'UTF-8');
//     $check = true;

//     if($contactSpam1){
//         exit();
//     }
//     if ($sanitizedContactCompanyId !== $contactCompanyId){
//         $check = false;
//     }
//     if($sanitizedContactMail !== $contactMail){
//         $check = false;
//     }
//     if($sanitizedContactName !== $contactName)
//     {
//         $check = false;
//     }
//     if($sanitizedContactPhone !== $contactPhone){
//         $check = false;
//     }
//     if ($check == false){
//         echo 'please, remove the specialcharacters from your inputs';
//     }


// }
//  $spam2 = $_POST['spam2'];
//  $spam3 = $_POST['spam3'];
?>




 
                   
         
                    
                   




<?php
echo "<br>";
echo "<br>";
echo "<br>";
?>
