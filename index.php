<?php
require("Controller/Controller.php");
if(isset($_GET["action"]))
{
    if($_GET["action"] == "Register_New_User")
    {
        Register_New_User();
    }
    elseif($_GET["action"] == "Connect_User")
    {
        Connect_User();
    }
    elseif($_GET["action"] == "Logout")
    {
        Disconnect();
    }
    elseif($_GET["action"] == "Create_Article")
    {
        Create_Article();
    }
    elseif($_GET["action"] == "Delete_Article")
    {
        Delete_Article($_POST['articles']);
    }
    elseif($_GET["action"] == "Get_Article")
    {
        Get_Article($_GET['Id']);
    }
    elseif($_GET["action"] == "Get_Articles")
    {
        Get_Articles();
    }
    elseif($_GET["action"] == "Show_Informations")
    {
        Show_Informations();
    }
    elseif($_GET["action"] == "To_Connect")
    {
        To_Connect();
    }
    elseif($_GET["action"] == "To_Register")
    {
        To_Register();
    }
    elseif($_GET["action"] == "Set_Comment")
    {
        Set_Comment($_GET["Id"]);
    }
    elseif($_GET["action"] == "Modify_Article")
    {
        Modify_Article();
    }
    elseif($_GET["action"] == "Get_Mentions")
    {
        Get_Mentions();
    }
    elseif($_GET["action"] == "Report_Comment")
    {
        Report_Comment($_GET["News_Owner"], $_GET["Comment_Id"]);
    }
    elseif($_GET["action"] == "Get_Reported_Comments")
    {
        Get_Reported_Comments();
    }
    else
    {
        echo "Error";
    }
}
elseif (isset($_POST["Delete_Article"])) 
{
    Delete_Article();
}
elseif (isset($_POST["Delete_Comment"])) 
{
    Delete_Comment();
}
elseif (isset($_POST["Authorize_Comment"])) 
{
    Authorize_Comment();
}
elseif (isset($_POST["Edit"])) 
{
    Edit_Article();
}
else
{
    Show_Articles();
}









   



