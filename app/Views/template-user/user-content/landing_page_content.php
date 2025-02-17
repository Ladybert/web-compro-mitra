<?= $this->extend('template-user/landing-page-layout/page_layout') ?>

<!-- Header Content -->
<?= $this->section('header') ?>
    <?= $this->include('template-user/landing-page-layout/header') ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('content') ?>
    <?= $this->include('template-user/user-content/section_one') ?>
    <?= $this->include('template-user/user-content/section_two') ?>
<?= $this->endSection() ?>
