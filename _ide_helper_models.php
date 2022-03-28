<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Call
 *
 * @property int $id
 * @property string|null $callId
 * @property string|null $quantity
 * @property string|null $result
 * @property string|null $script
 * @property \Illuminate\Support\Carbon|null $callDate
 * @property string|null $callLength
 * @property string|null $teleoperateurId
 * @property string|null $clientId
 * @property string|null $productId
 * @property string|null $teamid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Call newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Call newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Call query()
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereCallDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereCallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereCallLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereScript($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereTeamid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereTeleoperateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Call whereUpdatedAt($value)
 */
	class Call extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string $company
 * @property string $position
 * @property string $phone
 * @property string|null $teleoperateur
 * @property string|null $email
 * @property string|null $gender
 * @property string|null $country
 * @property string|null $city
 * @property string|null $address
 * @property string|null $zip
 * @property string|null $teamid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereTeamid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereTeleoperateur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereZip($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LastWeek
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|LastWeek newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LastWeek newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LastWeek query()
 */
	class LastWeek extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Manager
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Manager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Manager query()
 */
	class Manager extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $quantity
 * @property string $teamid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTeamid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sale
 *
 * @property int $id
 * @property int $teleoperateurId
 * @property int $callCount
 * @property float $earnings
 * @property int $saleCount
 * @property int $productCount
 * @property string $teamid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCallCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereEarnings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereProductCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereSaleCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTeamid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTeleoperateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUpdatedAt($value)
 */
	class Sale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Script
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $teamid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Script newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Script newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Script query()
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereTeamid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Script whereUpdatedAt($value)
 */
	class Script extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ThisWeek
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|ThisWeek newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThisWeek newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThisWeek query()
 */
	class ThisWeek extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $company
 * @property string|null $type
 * @property string|null $teamid
 * @property string|null $phone
 * @property string|null $clients
 * @property string|null $country
 * @property string|null $city
 * @property string|null $address
 * @property string|null $zip
 * @property string|null $image
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereClients($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTeamid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZip($value)
 */
	class User extends \Eloquent {}
}

