<?php

namespace Codelight\GDPR\Admin;

use Codelight\GDPR\Admin\AdminNotice;

class AdminPrivacySafe extends AdminNotice
{
    public function render()
    {
        if (!$this->template) {
            trigger_error('Template not set for installer step admin notice!', E_USER_ERROR);
        }

        echo gdpr('view')->render('admin/notices/header-privacy-safe');
        echo gdpr('view')->render($this->template, $this->data);
        echo gdpr('view')->render('admin/notices/footer-step');
    }
}