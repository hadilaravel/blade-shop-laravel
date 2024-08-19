<?php

namespace Modules\Admin\Entities\Access;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name' ];

    public function roles ()
    {
        return $this->belongsToMany(Role::class );
    }

    public function users ()
    {
        return $this->belongsToMany(User::class );
    }

    public Const PermissionRole = 'PermissionRole';
    public Const PermissionCategoryProduct = 'PermissionCategoryProduct';
    public Const PermissionBrand = 'PermissionBrand';
    public Const PermissionProduct = 'PermissionProduct';
    public Const PermissionStoreRoom = 'PermissionStoreRoom';
    public Const PermissionDelivery = 'PermissionDelivery';
    public Const PermissionPayment = 'PermissionPayment';
    public Const PermissionOrder = 'PermissionOrder';
    public Const PermissionCommentProduct = 'PermissionCommentProduct';
    public Const PermissionCustomer = 'PermissionCustomer';
    public Const PermissionUserAdmin = 'PermissionUserAdmin';
    public Const PermissionDiscount = 'PermissionDiscount';
    public Const PermissionCategoryPost = 'PermissionCategoryPost';
    public Const PermissionPost = 'PermissionPost';
    public Const PermissionLabel = 'PermissionLabel';
    public Const PermissionFaq = 'PermissionFaq';
    public Const PermissionCommentPost = 'PermissionCommentPost';
    public Const PermissionNotify = 'PermissionNotify';
    public Const PermissionCategoryTicket = 'PermissionCategoryTicket';
    public Const PermissionTicket = 'PermissionTicket';
    public Const PermissionSetting = 'PermissionSetting';
    public Const PermissionBanner = 'PermissionBanner';
    public Const PermissionAbout = 'PermissionAbout';



    public static array $permissions = [
        self::PermissionRole,
        self::PermissionCategoryProduct,
        self::PermissionBrand,
        self::PermissionProduct,
        self::PermissionStoreRoom,
        self::PermissionDelivery,
        self::PermissionPayment,
        self::PermissionOrder,
        self::PermissionCommentProduct,
        self::PermissionCustomer,
        self::PermissionUserAdmin,
        self::PermissionDiscount,
        self::PermissionCategoryPost,
        self::PermissionPost,
        self::PermissionLabel,
        self::PermissionFaq,
        self::PermissionCommentPost,
        self::PermissionNotify,
        self::PermissionCategoryTicket,
        self::PermissionTicket,
        self::PermissionSetting,
        self::PermissionBanner,
        self::PermissionAbout,
    ];


    public function getNamePerssionAttribute()
    {
        switch ($this->name)
        {
            case 'PermissionRole':
                return 'دسترسی به سطوح دسترسی';
                break;
            case 'PermissionAbout':
                return 'دسترسی به درباره ما';
                break;
            case 'PermissionCategoryProduct':
                return 'دسترسی به دسته بندی محصول';
                break;
            case 'PermissionBrand':
                return 'دسترسی به برند ها';
                break;
            case 'PermissionProduct':
                return 'دسترسی به محصولات';
                break;
            case 'PermissionStoreRoom':
                return 'دسترسی به انبار';
                break;
            case 'PermissionDelivery':
                return 'دسترسی به روش های ارسال';
                break;
            case 'PermissionPayment':
                return 'دسترسی به پرداخت ها';
                break;
            case 'PermissionOrder':
                return 'دسترسی به سفارشات';
                break;
            case 'PermissionCommentProduct':
                return 'دسترسی به نظرات محصول';
                break;
            case 'PermissionCustomer':
                return 'دسترسی به مشتریان';
                break;
            case 'PermissionUserAdmin':
                return 'دسترسی به کاربران ادمین';
                break;
            case 'PermissionDiscount':
                return 'دسترسی به تخفیفات';
                break;
            case 'PermissionCategoryPost':
                return 'دسترسی به دسته بندی پست ها';
                break;
            case 'PermissionPost':
                return 'دسترسی به پست ها';
                break;
            case 'PermissionLabel':
                return 'دسترسی به برچسب ها';
                break;
            case 'PermissionFaq':
                return 'دسترسی به سوالات متداول ';
                break;
            case 'PermissionCommentPost':
                return 'دسترسی به نظرات پست ها';
                break;
            case 'PermissionNotify':
                return 'دسترسی به  اطلاع رسانی';
                break;
            case 'PermissionCategoryTicket':
                return 'دسترسی به دسته بندی تیکت  ها';
                break;
            case 'PermissionTicket':
                return 'دسترسی به   تیکت ها';
                break;
            case 'PermissionSetting':
                return 'دسترسی به  تنظیمات';
                break;
        }
    }


}

