<?php
declare(strict_types=1);

namespace App\Tenant;


use App\Models\AdministrativeRegion;

class TenantManager
{
    private $tenant;

    /**
     * @return AdministrativeRegion
     */
    public function getTenant(): ?AdministrativeRegion //null or AdministrativeRegion
    {
        return $this->tenant;
    }

    /**
     * @param AdministrativeRegion $tenant
     */
    public function setTenant(?AdministrativeRegion $tenant): void
    {
        $this->tenant = $tenant;
    }
}