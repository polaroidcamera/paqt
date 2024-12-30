<?php
namespace Api\Utils;

class RequestHelper
{
    // Roles voor het gemak hier even ingezet
    const ROLE_CALLCENTER  = 'callcenter';
    const ROLE_TAXIBEDRIJF = 'taxibedrijf';

    /**
     * Authorize on role
     *
     * @param string $role
     * @return bool
     */
    public static function authorizeOnRole(string $role): bool
    {
        // Hier kan bijvoorbeeld via JWT of een
        // andere manier de role geauthorizeerd worden
        if(!empty($role)) {
            return true;
        }

        ResponseHelper::send(403, "Unauthorized");
        exit;
    }
}
