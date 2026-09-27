<?php

include("model.php");
session_start(); //memulai session

//create session member list if not exist
if (!isset($_SESSION['memberList'])) {
    $_SESSION['memberList'] = array();
}

function createMember()
{
    $member = new model();
    $member->name = $_POST['inputName'];
    $member->phone = $_POST['inputPhone'];
    $member->email = $_POST['inputEmail'];
    $member->note = $_POST['inputNote'];
    array_push($_SESSION['memberList'], $member);
}

function updateMember($memberID)
{
    $member = $_SESSION['memberList'][$memberID]; // ambil data dengan index tertentu
    $member->name = $_POST['inputName'];
    $member->phone = $_POST['inputPhone'];
    $member->email = $_POST['inputEmail'];
    $member->note = $_POST['inputNote'];
}

function getAllMembers()
{
    return $_SESSION['memberList'];
}

function deleteMember($memberIndex)
{
    unset($_SESSION['memberList'][$memberIndex]); // array index = 0, 1, 2
}

function getMemberWithID($memberID)
{
    return $_SESSION['memberList'][$memberID];
}

//jika button_register di klik
if (isset($_POST['button_register'])) {
    createMember();
    header("Location: view.php"); // kembali ke halaman lain
}

//jika button_delete di klik
if (isset($_GET['deleteID'])) {
    deleteMember($_GET['deleteID']);
    header("Location: view.php"); // kembali ke halaman lain
}

//jika button_update di klik
if (isset($_POST['button_update'])) {
    updateMember($_POST['input_id']);
    header("Location: view.php"); // kembali ke halaman lain
}