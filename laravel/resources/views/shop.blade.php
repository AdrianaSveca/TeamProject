<x-layout>

    <div class="-mx-8 -mt-8">
        <section class="relative w-full m-0 p-0">
            <div class="relative min-h-[240px] md:min-h-[255px] w-full overflow-hidden flex flex-col justify-end">
                
                <img
                    src="{{ asset('images/banner2-bg.jpg') }}"
                    alt="WELLTH hero"
                    class="absolute inset-0 w-full h-full object-cover"
                >

                <div class="absolute inset-0 bg-black/20"></div>

                <div class="relative z-10 flex justify-center items-center px-4 pb-6">
                    <div class="text-center max-w-xl mx-auto">
                        <p class="mb-4 text-xl sm:text-base md:text-lg text-white">
                            Discover the perfect products to meet your fitness goals.
                        </p>

                </div>
                </div>
            </div>
        </section>
    </div>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-14 space-y-16 md:space-y-20">

<section class="space-y-4">
    <div class="flex justify-between items-center">
        <input
           type="text"
           placeholder="Search products..."
           class="w-full md:w-1/2 p-3 border rounded-xl text-lg"
           id="productSearch"
        >
        <select class="border p-2 rounded-md ml-4">
            <option>Relevance</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
        <select>
     </div>
</section>

<section class="grid gap-10 md:grid-cols-5 lg:grid-cols-6">

    <div class="md:col-span-1 lg:col-span-1 space-y-6">
        <h3 class="text-xl font-semibold text-slate-900">Categories</h3>
        <ul class="space-y-3 text-sm text-slate-600">
            <li><a href="#supplements" class="...">Supplements, Vitamins & Minerals</a></li>
            <li><a href="#recovery" class="...">Recovery Products</a></li>
            <li><a href="#protein-products" class="...">Protein Products</a></li>
            <li><a href="#gym-accessories" class="...">Gym Accessories</a></li>
            <li><a href="#fitness-gadgets" class="...">Fitness Gadgets</a></li>
</ul>

<h3 class="text-xl font-semibold text-slate-900">Filters</h3>
<div class="space-y-4">
    <div>
        <h4 class="text-sm font-semibold text-slate-800">Price Range</h4>
        <input type="range" min="1" max="100" value="15" class="w-full" />
        <div class="flex justify-between text-sm text-slate-600">
            <span>£1.00</span>
            <span>£50.00</span>
        </div>
    </div>
    <div>
        <h4 class="text-sm font-semibold text-slate-750 mb-3">Quantity/Size</h4>
        <div class="space-y-2 text-sm text-slate-600">
            <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                Single pack
            </label>
            <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                Twin Pack
             </label>
             <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                1 month supply
             </label>
             <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                Bundle
             </label>
             <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                XS/S
             </label>
             </label>
             <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                M
             </label>
             <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                L 
             </label>
             <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                XL
             </label>
             <label class="flex items-center">
                <input type="checkbox" class="mr-2" />
                One-Size
             </label>
         </div>
     </div>
   </div>
</div>

<div class="md:col-span-4 lg:col-span-5 space-y-10">
   
<div id="supplements" class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 hidden">

<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/supplement.jpg') }}" alt="Supplement 1" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Premium Supplements Giftbox</h3>
     <p class="text-xs md:text-sm text-slate-600"> Make someone feel special today with our exclusive Premium Supplements Gift Box. This beautiful package includes two distinct formulas designed to enhance your loved one's health and well-being. Inside, you'll also find a personalized card, adding a thoughtful touch to the wellness experience. Perfect for gifting or indulging yourself, this gift box combines quality, care, and personalized attention in one delightful box.</p>
     <p class="text-sm font-semibold text-slate-900">£23.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/berrysupplement.jpg') }}" alt="Supplement 2" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Berry Blossom</h3>
     <p class="text-xs md:text-sm text-slate-600"> Restore your health with our Berry Burst Supplement Formula, a vibrant blend of nature’s finest berries. Packed with essential vitamins and antioxidants, this powerful formula supports immunity, boosts energy, and promotes overall well-being. Experience the burst of berry goodness and take a step towards a healthier you!</p>
     <p class="text-sm font-semibold text-slate-900">£8.49</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/omega-3.png') }}" alt="fish oil" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Omega-3 Fish Oil</h3>
     <p class="text-xs md:text-sm text-slate-600"> Omega-3 fish oil is a vital supplement for those seeking to support their overall health and wellness. Rich in essential fatty acids, this powerful product aids in promoting heart health, improving cognitive function, and reducing inflammation throughout the body. Sourced from premium quality fish, our omega-3 fish oil ensures you receive the highest potency of EPA and DHA, the key components that contribute to its numerous health benefits. Incorporating this supplement into your daily routine can help maintain a balanced lifestyle and support your journey towards great health.</p>
     <p class="text-sm font-semibold text-slate-900">£11.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/minerals.png') }}" alt="Minerals" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Vitamin & Minerals</h3>
     <p class="text-xs md:text-sm text-slate-600"> Our trio collection of Vitamin C, Vitamin D, and essential minerals are available to support your immune system, skin health, bone health, heart health and overall wellness.</p>
     <p class="text-sm font-semibold text-slate-900">£10.00</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/supplementbottle.jpg') }}" alt="supbottle" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Daily Dose of Supplements</h3>
     <p class="text-xs md:text-sm text-slate-600"> Our carefully created selection of nutritional supplements is designed to support your wellness journey. Whether you're aiming to boost your immune system, enhance your energy, or achieve a balanced diet, our products are crafted to meet your unique health needs.</p>
     <p class="text-sm font-semibold text-slate-900">£6.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>

</div>

<div class="md:col-span-4 lg:col-span-5 space-y-10">
   
<div id="recovery" class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 hidden">

<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/recovery pills.png') }}" alt="Recovery 1" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Recovery Medicine Pills</h3>
     <p class="text-xs md:text-sm text-slate-600"> Our life-saving medicine pills are your essential ally in maintaining optimal health and wellness. Designed to cure illness and improve the immune system, these pills support your body's natural defenses, helping you recover more quickly from sickness, discomfort or pain.</p>
     <p class="text-sm font-semibold text-slate-900">£7.69</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/recovery.png') }}" alt="Recovery 2" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Recovery</h3>
     <p class="text-xs md:text-sm text-slate-600"> Indulge in the rich, creamy taste of our Recovery Chocolate Flavor, expertly crafted to enhance your post-exercise recovery. This delicious blend is not only a treat for your tastebuds but also a powerhouse of essential nutrients designed to help you bounce back stronger.</p>
     <p class="text-sm font-semibold text-slate-900">£10.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/healthf.jpg') }}" alt="Recovery 3" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Health Formula</h3>
     <p class="text-xs md:text-sm text-slate-600"> Your ultimate partner in achieving optimal health. Our unique blend of essential vitamins, minerals, and antioxidants is crafted to support your body's natural spirit and enhance overall well-being.</p>
     <p class="text-sm font-semibold text-slate-900">£12.50</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/powerboost.jpg') }}" alt="Power boost 1" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Power boost</h3>
     <p class="text-xs md:text-sm text-slate-600"> Specially formulated to elevate your vitality and enhance your performance. Whether you're gearing up for an intense workout or seeking a energy kick. This is your go-to solution for efficient results, sustained energy and focus.</p>
     <p class="text-sm font-semibold text-slate-900">£6.80</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/elite-recovery.jpg') }}" alt="elite-recovery" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Elite Recovery</h3>
     <p class="text-xs md:text-sm text-slate-600"> Unlock your full potential with the ultimate recovery solution for rejuvenating your body and mind. Designed for those who demand the best from themselves, our specialized products enhance recovery, reduce fatigue, and elevate your overall wellness.</p>
     <p class="text-sm font-semibold text-slate-900">£3.89</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>

</div>

<div class="md:col-span-4 lg:col-span-5 space-y-10">
   
<div id="protein-products" class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 hidden">
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/preworkout formula.png') }}" alt="Protein 1" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Limited Edition Pre-Workout Formula</h3>
     <p class="text-xs md:text-sm text-slate-600"> A serious level up from the original! This limited-edition formula has an even larger capacity which boosts energy, performance, focus and endurance. This is through it's powerful blend of premium natural ingredients like natural caffeine, amino acids, BCAAs, vitamins & minerals, and electrolytes. Further supporting muscle growth, increasing strength and stamina. Designed for serious fitness enthusiasts, helping you train harder and achieve your goals.</p>
     <p class="text-sm font-semibold text-slate-900">£14.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/proteinpowder.jpeg') }}" alt="Protein 2" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Protein Powder</h3>
     <p class="text-xs md:text-sm text-slate-600"> Packed with high-quality protein, for muscle growth and strength. With great flavour, easy mixing and a good quantity, it's a convenient, nutritious way to support your fitness routine.</p>
     <p class="text-sm font-semibold text-slate-900">£14.49</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/formula1.jpg') }}" alt="Protein 3" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Energizing Pre-Workout Formula</h3>
     <p class="text-xs md:text-sm text-slate-600"> Long-lasting, large capacity, boosts endurance and focus to enhance your performance. Delivers sustained energy and supports hydration with muscle recovery. Ideal for athletes and fitness enthusiasts, its designed to take your workouts to the next level.</p>
     <p class="text-sm font-semibold text-slate-900">£13.50</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/protein bar.jpg') }}" alt="Protein 4" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Protein Bar</h3>
     <p class="text-xs md:text-sm text-slate-600"> Contains 15g of high quality protein, low sugar, and essential nutrients for muscle recovery and lasting energy. Made with all natural ingredients, it's the perfect on the go snack for fuelling workouts and a healthy diet. </p>
     <p class="text-sm font-semibold text-slate-900">£3.50</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/proteinyoghurtsatchet.jpg') }}" alt="Protein 5" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Yoghurt Satchet</h3>
     <p class="text-xs md:text-sm text-slate-600"> Fuel your wellness goals with our nutrient-rich Yoghurt Satchet, packed with high-quality protein and calcium for strong bones and muscles. With reduced fat, healthy fats, and low sugar, it delivers great taste. Perfect for busy lifestyles or post-workout recovery, offering a creamy,convenient, and nutritious snack anytime.</p>
     <p class="text-sm font-semibold text-slate-900">£4.69</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>

</div>

<div class="md:col-span-4 lg:col-span-5 space-y-10">
   
<div id="gym-accessories" class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 hidden">
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/thecollection.jpg') }}" alt="Accessory 1" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">The Elite Collection</h3>
     <p class="text-xs md:text-sm text-slate-600"> This trio offers premium quality fitness essentials built for performance and comfort. The 650 ml bottle has a leak proof design. Perfect for hydration at the gym or on the go. Alternatively, the branded grip gloves provide enhanced grip, breathable comfort, and an adjustable fit for more effective training. The 2 in 1 Backbrace Vest combines posture support and compression in a smooth,adjustable design for workouts or daily use. Together all these products improve your training and everyday lifestyle.</p>
     <p class="text-sm font-semibold text-slate-900">£19.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/waistbelt.png') }}" alt="Accessory 2" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Waist Belt</h3>
     <p class="text-xs md:text-sm text-slate-600"> High quality, providing enhanced stability and comfort for workouts like weightlifting, running and yoga. Featuring an adjustable fit, breathable fabric, offering strong core and posture support. Designed to boost performance and efficiency, it's a versatile accessory that will help you reach your fitness goals faster! </p>
     <p class="text-sm font-semibold text-slate-900">£6.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>

<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/lifting straps.png') }}" alt="Accessory 3" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Lifting straps</h3>
     <p class="text-xs md:text-sm text-slate-600"> Boost your strength training with premium lifting straps designed for a better grip, support, hand and wrist comfort. Featuring durable material, padded support, and an adjustable universal fit. Ideal for weight lifting and pull up exercises. Perfect for both beginners and experienced lifters. </p>
     <p class="text-sm font-semibold text-slate-900">£16.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>

<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/set.png') }}" alt="Accessory duo set 4" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">The special duo</h3>
     <p class="text-xs md:text-sm text-slate-600"> Upgrade your fitness journey with our stylish branded cap for comfort and protection. Including our handy, durable, spacious gym bag with multiple compartments for all your essentials. The perfect combo of style and organization for an active lifestyle.</p>
     <p class="text-sm font-semibold text-slate-900">£25.00</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>

</div>

<div class="md:col-span-4 lg:col-span-5 space-y-10">
   
<div id="fitness-gadgets" class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 hidden">

<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img 
    src="{{ asset('images/headphones.jpg') }}" alt="Gadget 1" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Wireless Headphones</h3>
     <p class="text-xs md:text-sm text-slate-600"> Designed to take your workout experience to the next level. Whether you're doing exercise, travelling or doing chores, these wireless headphones are the perfect companion for anyone looking to elevate their fitness journey with immersive sound.</p>
     <p class="text-sm font-semibold text-slate-900">£21.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img src="{{ asset('images/smartwatch.png') }}" alt="Gadget 2" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Smartwatch</h3>
     <p class="text-xs md:text-sm text-slate-600">Introducing our cutting edge smartwatch, which supports an active lifestyle,whether you're a beginner or experienced athlete. Increasing your motivation, tracking your progress and helping you reach your desired goals.</p>
     </p>
     <p class="text-sm font-semibold text-slate-600"> Key features include:</p>
     <p class="text-xs md:text-sm text-slate-600">- Advanced Heart Rate, Oxygen and Sleep Monitoring </p>
     <p class="text-xs md:text-sm text-slate-600">- Accurate fitness tracking across various activities, personalised workouts and reminders.</p>
     <p class="text-xs md:text-sm text-slate-600">- Smooth syncing with devices, trendy design and long battery life.
     <p class="text-sm font-semibold text-slate-900">£34.99</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>

<article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
    <img src="{{ asset('images/digitalfoodscale.png') }}" alt="Gadget 3" class="w-full h auto object-contain">
    <div class="p-4 space-y-1">
     <h3 class="text-sm font-semibold text-slate-900">Digital Food Calorie Scale</h3>
     <p class="text-xs md:text-sm text-slate-600"> Helps track your food intake with accuracy and ease. Offers precise measurements in grams or ounces, a built in calorie database, a clear digital display, and a sleek, compact design. With an easy interface, it supports meal prep and dietary goals, making healthy eating simpler and more effective.</p>
     <p class="text-sm font-semibold text-slate-900">£12.50</p>
     <button class="mt-2 w-full py-2 px-4 text-white bg-[#7FA82E] rounded-full hover:bg-emrald-600">
        Add to Cart 
</button>
</div>
</article>
</div>

       </div>
     </section>
   </main>
</x-layout>


    
    