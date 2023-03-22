
<!DOCTYPE html>
<html lang="en">
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
            <div style="margin-top:5%"class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>BARANGAY BULILIS</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="account" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Chart Of Accounts</a>
                <a href="deposit" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Deposit</a>
                         <a href="expense" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Expense</a>
                        <a href="fund" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Fund</a>
            </div>
        </div>
</body>
</html>
<style>
/* 
    :root {
--main-bg-color: #009d63;
--main-text-color: #009d63;
--second-text-color: #bbbec5;
--second-bg-color: #c1efde;
} */

.primary-text {
color: var(--main-text-color);
}

.second-text {
color: var(--second-text-color);
}

.primary-bg {
background-color: var(--main-bg-color);
}

.secondary-bg {
background-color: var(--second-bg-color);
}

.rounded-full {
border-radius: 100%;
}

#wrapper {
overflow-x: hidden;
}

#sidebar-wrapper {
min-height: 100vh;
margin-left: -15rem;
-webkit-transition: margin 0.25s ease-out;
-moz-transition: margin 0.25s ease-out;
-o-transition: margin 0.25s ease-out;
transition: margin 0.25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
padding: 0.875rem 1.25rem;
font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
width: 15rem;
}

#page-content-wrapper {
min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
margin-left: 0;
}

#menu-toggle {
cursor: pointer;
}

.list-group-item {
border: none;
padding: 10px 10px;
}

.list-group-item.active {
background-color: transparent;
color: var(--main-text-color);
font-weight: bold;
border: none;
}

@media (min-width: 768px) {
#sidebar-wrapper {
margin-left: 0;
}

#page-content-wrapper {
min-width: 0%;
width: 100%;
}

#wrapper.toggled #sidebar-wrapper {

}}

 