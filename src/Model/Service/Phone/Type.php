<?php

namespace ApiDQ\Model\Service\Phone;

use UnexpectedValueException;

/**
 * NOTES:
 * FIXED_LINE_OR_MOBILE:
 *     In some regions (e.g. the USA), it is impossible to distinguish
 *     between fixed-line and mobile numbers by looking at the phone
 *     number itself.
 * SHARED_COST:
 *     The cost of this call is shared between the caller and the
 *     recipient, and is hence typically less than PREMIUM_RATE calls.
 *     See // http://en.wikipedia.org/wiki/Shared_Cost_Service for
 *     more information.
 * VOIP:
 *     Voice over IP numbers. This includes TSoIP (Telephony Service over IP).
 * PERSONAL_NUMBER:
 *     A personal number is associated with a particular person, and may
 *     be routed to either a MOBILE or FIXED_LINE number. Some more
 *     information can be found here:
 *     http://en.wikipedia.org/wiki/Personal_Numbers
 * UAN:
 *     Used for "Universal Access Numbers" or "Company Numbers". They
 *     may be further routed to specific offices, but allow one number
 *     to be used for a company.
 * VOICEMAIL:
 *     Used for "Voice Mail Access Numbers".
 * UNKNOWN:
 *     A phone number is of type UNKNOWN when it does not fit any of
 *     the known patterns for a specific region.
 *
 * Protobuf type <code>services.phone.Type</code>
 */
class Type
{
    /**
     *
     */
    public const UNKNOWN = 'UNKNOWN';
    /**
     *
     */
    public const FIXED_LINE = 'FIXED_LINE';
    /**
     *
     */
    public const MOBILE = 'MOBILE';
    /**
     *
     */
    public const FIXED_LINE_OR_MOBILE = 'FIXED_LINE_OR_MOBILE';
    /**
     *
     */
    public const TOLL_FREE = 'TOLL_FREE';
    /**
     *
     */
    public const PREMIUM_RATE = 'PREMIUM_RATE';
    /**
     *
     */
    public const SHARED_COST = 'SHARED_COST';
    /**
     *
     */
    public const VOIP = 'VOIP';
    /**
     *
     */
    public const PERSONAL_NUMBER = 'PERSONAL_NUMBER';
    /**
     *
     */
    public const PAGER = 'PAGER';
    /**
     *
     */
    public const UAN = 'UAN';
    /**
     *
     */
    public const VOICEMAIL = 'VOICEMAIL';

    /**
     * @return string[]
     */
    public static function getTypes(): array
    {
        return [
            self::UNKNOWN,
            self::FIXED_LINE,
            self::MOBILE,
            self::FIXED_LINE_OR_MOBILE,
            self::TOLL_FREE,
            self::PREMIUM_RATE,
            self::SHARED_COST,
            self::VOIP,
            self::PERSONAL_NUMBER,
            self::PAGER,
            self::UAN,
            self::VOICEMAIL,
        ];
    }

    public static function exists(string $type): bool
    {
        return in_array($type, self::getTypes(), true);
    }

    public static function check(string $type): void
    {
        if (!self::exists($type)) {
            throw new UnexpectedValueException('Enum: invalid Type value');
        }
    }
}
