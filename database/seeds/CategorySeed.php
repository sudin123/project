<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Category;

class CategorySeed extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();
        $categories = array(
            array(
                "name" => "Apparels & Accessories",
                "childrens" => array(
                    array("name" => "Baby & Children Accesories"),
                    array("name" => "Baby & Children Clothing"),
                    array("name" => "Bags & Luggage"),
                    array("name" => "Jewellery"),
                    array("name" => "Men's Accessories"),
                    array("name" => "Men's Clothing"),
                    array("name" => "Men's Shoes"),
                    array("name" => "Sunglasses"),
                    array("name" => "Watches"),
                    array("name" => "Women's Accessories"),
                    array("name" => "Women's Clothing"),
                    array("name" => "Women's Shoes"),
                    array("name" => "Other Apparels & Accessories"),
                ),
            ),
            array(
                "name" => "Automobiles",
                "childrens" => array(
                    array(
                        "name" => "Cars",
                        "subcat" => array(
                            array("name" => "Chevrolet"),
                            array("name" => "Daihatsu"),
                            array("name" => "Fiat"),
                            array("name" => "Ford"),
                            array("name" => "Geely"),
                            array("name" => "Honda"),
                            array("name" => "Hyundai"),
                            array("name" => "Kia"),
                            array("name" => "Land Rover"),
                            array("name" => "Mahindra"),
                            array("name" => "Maruti Suzuki"),
                            array("name" => "Mazda"),
                            array("name" => "Mitsubishi"),
                            array("name" => "Nissan"),
                            array("name" => "Other Chinese Brands"),
                            array("name" => "Perodua"),
                            array("name" => "Skoda"),
                            array("name" => "Ssangyong"),
                            array("name" => "Tata"),
                            array("name" => "Toyota"),
                            array("name" => "Volkswagen"),
                            array("name" => "Other Brands"),
                        ),
                    ),
                    array(
                        "name" => "Motorcycle",
                        "subcat" => array(
                            array("name" => "Apollo - Rieju"),
                            array("name" => "Bajaj"),
                            array("name" => "Hartford"),
                            array("name" => "Hero Honda"),
                            array("name" => "Honda"),
                            array("name" => "Hyosung"),
                            array("name" => "KTM"),
                            array("name" => "Mahindra"),
                            array("name" => "Royal Enfield"),
                            array("name" => "Suzuki"),
                            array("name" => "TVS"),
                            array("name" => "Yamaha"),
                            array("name" => "Other Motorcycle Brands"),
                        ),
                    ),
                    array(
                        "name" => "Parts & Accessories",
                        "subcat" => array(
                            array("name" => "For Car"),
                            array("name" => "For Motorcycle"),
                        ),
                    ),
                ),
            ),
            array(
                "name" => "Beauty & Health",
                "childrens" => array(
                    array("name" => "Body Care"),
                    array("name" => "Cosmetics"),
                    array("name" => "Eye Care"),
                    array("name" => "Face Care"),
                    array("name" => "Fitness Instruments"),
                    array("name" => "Hair Care"),
                    array("name" => "Medical & Health Devices"),
                    array("name" => "Perfumes & Fragrances"),
                    array("name" => "Other Beauty & Health"),
                ),
            ),
            array(
                "name" => "Books & Magazines",
                "childrens" => array(
                    array("name" => "Children & School Book"),
                    array("name" => "Computer & Internet"),
                    array("name" => "Educational Textbook"),
                    array("name" => "Fiction"),
                    array("name" => "Magazines"),
                    array("name" => "Non Fiction"),
                    array("name" => "Other Books"),
                ),
            ),
            array(
                "name" => "Business & Industrial",
                "childrens" => array(
                    array("name" => "Business For Sale"),
                    array("name" => "Business Offers"),
                    array("name" => "Business Services"),
                    array("name" => "Dealership - Franchise"),
                    array("name" => "Equipments For Business"),
                    array("name" => "Generator & Power Equipments"),
                    array("name" => "Machinery"),
                    array("name" => "Office Electronics"),
                    array("name" => "Office Furniture & Fixtures"),
                    array("name" => "Office Supplies"),
                    array("name" => "Raw Materials"),
                    array("name" => "Security & CCTV"),
                    array("name" => "Tool & Small Machines"),
                    array("name" => "Wholesale B2B"),
                    array("name" => "Other Business & Industrial"),
                ),
            ),
            array(
                "name" => "Computer & Peripherals",
                "childrens" => array(
                    array("name" => "Desktop Accessories"),
                    array("name" => "Desktop Components"),
                    array("name" => "Desktop PC"),
                    array("name" => "Games"),
                    array("name" => "Graphic & Video Cards"),
                    array("name" => "Laptop Accessories"),
                    array("name" => "Laptops"),
                    array("name" => "Monitors"),
                    array("name" => "Networking Equipments"),
                    array("name" => "Printers & Scanner"),
                    array("name" => "Software"),
                    array("name" => "Storage & Optical Drives"),
                    array("name" => "Tablet Accessories"),
                    array("name" => "Tablet PC & iPads"),
                    array("name" => "Other Computer & Peripherals"),
                ),
            ),
            array(
                "name" => "Consumer Electronics",
                "childrens" => array(
                    array("name" => "Camera Lens & Accesories"),
                    array("name" => "Digital Camcorder"),
                    array("name" => "Digital Camera"),
                    array("name" => "Film Camera & Tape Camcorder"),
                    array("name" => "Generator & Inverter (upto 5kva)"),
                    array("name" => "Headphones & Speakers"),
                    array("name" => "Home Audio-Video System"),
                    array("name" => "iPod & Portable Media Players"),
                    array("name" => "Projectors"),
                    array("name" => "Television"),
                    array("name" => "Other Consumer Electronics"),
                ),
            ),
            array(
                "name" => "Home, Furnishing & Appliances",
                "childrens" => array(
                    array("name" => "Antique & Collectables"),
                    array("name" => "Art & Handicrafts"),
                    array("name" => "Bath & Plumbing"),
                    array("name" => "Construction Materials"),
                    array("name" => "Food & Drinks"),
                    array("name" => "Garden & Outdoor"),
                    array("name" => "Home Appliances"),
                    array("name" => "Home Decor & Interiors"),
                    array("name" => "Home Furniture"),
                    array("name" => "Kitchen Appliances"),
                    array("name" => "Kitchenwares & Utensils"),
                    array("name" => "Lightning, Solar & Electricals"),
                    array("name" => "Linens & Mattress"),
                    array("name" => "Tools For Home Improvement"),
                    array("name" => "Other Home, Furnishing & Appliances"),
                ),
            ),
            array(
                "name" => "Mobile & Accessories",
                "childrens" => array(
                    array(
                        "name" => "Handsets",
                        "subcat" => array(
                            array("name" => "Apple iPhone"),
                            array("name" => "Blackberry"),
                            array("name" => "Colors"),
                            array("name" => "Gionee"),
                            array("name" => "HTC"),
                            array("name" => "Huawei"),
                            array("name" => "Karbonn"),
                            array("name" => "Lava - Xolo"),
                            array("name" => "LG"),
                            array("name" => "Micromax"),
                            array("name" => "Motorola"),
                            array("name" => "Nokia - Microsoft"),
                            array("name" => "Samsung"),
                            array("name" => "Sony"),
                            array("name" => "Xiaomi"),
                            array("name" => "Other Brands"),
                            array("name" => "Other Chinese Brands"),
                            array("name" => "Other Copy-Clone Phones"),
                            array("name" => "Other Indian Brands"),
                        ),
                    ),
                    array(
                        "name" => "Accessories",
                        "subcat" => array(
                            array("name" => "Battery & Chargers"),
                            array("name" => "Cover & Cases"),
                            array("name" => "Data Cables"),
                            array("name" => "Headsets & Earphones"),
                            array("name" => "Memory Cards"),
                            array("name" => "Mobile Apps & Games"),
                            array("name" => "Mobile Parts"),
                            array("name" => "Mobile Unlock & Upgrade"),
                            array("name" => "Power Banks"),
                            array("name" => "Selfie Monopod"),
                            array("name" => "Smart Watch & Bands"),
                            array("name" => "Other Accessories"),
                        ),
                    ),
                ),
            ),
            array(
                "name" => "Music & Sports",
                "childrens" => array(
                    array("name" => "Amp & Speakers"),
                    array("name" => "Bicycle Parts & Accessories"),
                    array("name" => "Bicycles"),
                    array("name" => "DJ Gear & Lighting"),
                    array("name" => "Instrument - Drums"),
                    array("name" => "Instrument - Guitars"),
                    array("name" => "Instrument - Others"),
                    array("name" => "Microphones"),
                    array("name" => "Mixers, Pedal & Processors"),
                    array("name" => "Other Music Accessories"),
                    array("name" => "Other Sporting Goods"),
                )
            ),
            array(
                "name" => "Pets & Pet Care",
                "childrens" => array(
                    array("name" => "Pet - Dogs"),
                    array("name" => "Pet - Fish"),
                    array("name" => "Pet - Other Pets"),
                    array("name" => "Pet Products & Accessories"),
                    array("name" => "Pet Services"),
                ),
            ),
            array(
                "name" => "Real Estate",
                "childrens" => array(
                    array("name" => "Flatmates & Paying Guests"),
                    array("name" => "For Rent - Flat & Apartment"),
                    array("name" => "For Rent - House"),
                    array("name" => "For Rent - Land"),
                    array("name" => "For Rent - Shop & Office Space"),
                    array("name" => "For Sale - Commercial Property"),
                    array("name" => "For Sale - Flat & Apartment"),
                    array("name" => "For Sale - House"),
                    array("name" => "For Sale - Land"),
                ),
            ),
            array(
                "name" => "Services",
                "childrens" => array(
                    array("name" => "Advertising-Printing-Publication"),
                    array("name" => "Car Rentals"),
                    array("name" => "Classes - Learning-Hobby-Music"),
                    array("name" => "Coaching & Tutors"),
                    array("name" => "Computer - Sales & Repair"),
                    array("name" => "Computer - Web & Design"),
                    array("name" => "Courses - Education & Training"),
                    array("name" => "Electronics Repair"),
                    array("name" => "Event Planner & Caterers"),
                    array("name" => "Financial & Legal"),
                    array("name" => "Health, Fitness & Beauty"),
                    array("name" => "Home Construct & Design"),
                    array("name" => "Home Repair & Helper"),
                    array("name" => "Movers Courier & Transport"),
                    array("name" => "Music-Video-Photography"),
                    array("name" => "Restaurant-Hotels"),
                    array("name" => "Travel Agent & Packages"),
                    array("name" => "Writing - Designing - Translating"),
                    array("name" => "Other Services"),
                ),
            ),
            array(
                "name" => "Toys & Video Games",
                "childrens" => array(
                    array("name" => "Gaming Accessories"),
                    array("name" => "Gaming Console"),
                    array("name" => "Gaming Console - Portable"),
                    array("name" => "Gaming Disc & Cartidges"),
                    array("name" => "Toys - Educational"),
                    array("name" => "Toys - General"),
                    array("name" => "Toys - Outdoor"),
                    array("name" => "Toys - Stuffed, Dolls & Figures"),
                    array("name" => "Other Toys & Video Games"),
                ),
            ),
            array(
                "name" => "Want To Buy (Buyer List)",
                "childrens" => array(
                    array("name" => "Apparel & Accessories"),
                    array("name" => "Audios & Videos"),
                    array("name" => "Beauty & Health"),
                    array("name" => "Books & Learning"),
                    array("name" => "Cameras & Optics"),
                    array("name" => "Car & Bikes"),
                    array("name" => "Computer & Peripherals"),
                    array("name" => "Consumer Electronics"),
                    array("name" => "Home, Furnishing & Appliances"),
                    array("name" => "Mobile & Accessories"),
                    array("name" => "Music & Sports"),
                    array("name" => "Pet & Animals"),
                    array("name" => "Real Estate"),
                    array("name" => "Services"),
                    array("name" => "Toys & Video Games"),
                ),
            ),
        );

        foreach ($categories as $list) {
            $parent = new Category;
            $parent->name = $list['name'];
            $parent->slug = Str::slug($list['name']);
            $parent->created_at = $faker->dateTimeThisYear();
            $parent->updated_at = $faker->dateTimeThisYear();
            $parent->parent_id = null;
            $parent->save();
            $sublist = $list['childrens'];
            $count = count($sublist);
            if ($count > 0) {
                foreach ($sublist as $list) {
                    $slug = Str::slug($list['name']);
                    $slugCount = count(\App\Category::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
                    $slug = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
                    $firstChild = new Category;
                    $firstChild->name = $list['name'];
                    $firstChild->slug = $slug;
                    $firstChild->created_at = $faker->dateTimeThisYear();
                    $firstChild->updated_at = $faker->dateTimeThisYear();
                    $firstChild->save();
                    $firstChild->makeChildof($parent);

                    if (array_key_exists('subcat', $list)) {
                        $subcat = $list['subcat'];
                        $subcatcount = count($subcat);
                        if ($subcatcount > 0) {
                            foreach ($subcat as $list) {
                                $slug = Str::slug($list['name']);
                                $slugCount = count(\App\Category::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
                                $slug = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
                                $secondChild = new Category;
                                $secondChild->name = $list['name'];
                                $secondChild->slug = $slug;
                                $secondChild->created_at = $faker->dateTimeThisYear();
                                $secondChild->updated_at = $faker->dateTimeThisYear();
                                $secondChild->save();
                                $secondChild->makeChildof($firstChild);
                            }
                        }
                    }
                }
            }
        }
    }

}
