<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Whey Protein Isolate',
                'product_description' => 'High-quality protein supplement',
                'product_price' => 39.99,
                'product_image' => 'products/Whey_Protein_Isolate.png',
                'category_id' => 1,
                'flavours' => json_encode(['Chocolate', 'Salted caramel', 'Cookies & Cream']),
                'information' => "Fuel your performance with our premium protein shake — expertly crafted to support muscle growth, faster recovery, and all-day energy.

Packed with high-quality protein, it delivers the essential nutrients your body needs to build lean muscle and stay strong, whether you’ve just finished an intense workout or need a quick, powerful boost during your day.

Smooth, delicious, and easy to mix, our formula blends perfectly with water or milk, giving you a rich, satisfying shake every time.

Designed for athletes, gym-goers, and anyone serious about their fitness, it helps reduce muscle soreness, supports recovery, and keeps you feeling fuller for longer.

No hassle. No compromise. Just clean, effective nutrition to help you perform at your best — every single day.",

                'directions' => "Mix 1 scoop (approx. 30g) of protein powder with 200–300ml of water or milk in a shaker or blender.

Shake well for 20–30 seconds until fully dissolved.

Consume 1–2 servings daily:
- Post-workout: within 30 minutes after exercise for optimal recovery.
- Anytime: as a convenient snack or to boost your daily protein intake.

For best results, use consistently alongside a balanced diet and regular training routine.",

                'ingredients' => "Whey Protein Concentrate (Milk), Whey Protein Isolate (Milk), Natural & Artificial Flavouring, Emulsifier (Soy Lecithin), Sweeteners (Sucralose, Acesulfame K), Thickener (Xanthan Gum), Salt.

Allergen Information: Contains Milk and Soy.

May contain traces of nuts, gluten, and egg due to manufacturing processes.",

                'nutrition' => json_encode([
            [
        'name' => 'Energy kJ/kcal',
        'per_100g' => '1603/378',
        'per_serving' => '513/121'
            ],
            [
        'name' => 'Fat',
        'sub' => 'of which saturates',
        'per_100g' => '3.5g (1.9g)',
        'per_serving' => '1.1g (0.6g)'
            ],
            [
        'name' => 'Carbohydrate',
        'sub' => 'of which sugars',
        'per_100g' => '15g (12g)',
        'per_serving' => '4.8g (3.8g)'
            ],
            [
        'name' => 'Fibre',
        'per_100g' => '1.4g',
        'per_serving' => '0.4g'
            ],
            [
        'name' => 'Protein',
        'per_100g' => '71g',
        'per_serving' => '25g'
            ],
            [
        'name' => 'Salt',
        'per_100g' => '1.00g',
        'per_serving' => '0.32g'
            ],
        ]),

                'faqs' => "Q: When should I take it?
A: Post-workout or anytime.

Q: Can I use it as a meal replacement?
A: It’s best used as a supplement, not a full meal replacement.

Q: Is it suitable for beginners?
A: Yes, it’s ideal for all fitness levels.",
            ],
            [
                'product_name' => 'Creatine Monohydrate 500g',
                'product_description' => 'Pure micronized creatine',
                'product_price' => 24.99,
                'product_image' => 'products/Creatine_Monohydrate.png',
                'category_id' => 1,
                'flavours' => json_encode(['Unflavoured', 'Raspberry', 'Fruit punch']),
                'information' => "Unlock your true strength with our premium creatine formula — designed to maximise power, performance, and muscle growth.

Backed by science and trusted by athletes worldwide, creatine helps your muscles produce more energy during high-intensity training, allowing you to push harder, lift heavier, and achieve better results.

Our ultra-pure, fast-absorbing formula supports increased strength, improved endurance, and enhanced muscle volume, giving you that full, powerful look.

Whether you are aiming to break personal records or build lean muscle, this is your edge.

Simple. Effective. Proven.

Take your training to the next level with creatine that works as hard as you do.",

                'directions' => "Mix 1 scoop (5g) with water or a drink once daily.

Take consistently, preferably after workouts or with a meal.",

                'ingredients' => "Creatine Monohydrate (100%).",

                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '0 kcal',
        'per_serving' => '0 kcal'
            ],
            [
        'name' => 'Protein',
        'per_100g' => '0g',
        'per_serving' => '0g'
            ],
            [
        'name' => 'Carbohydrates',
        'per_100g' => '0g',
        'per_serving' => '0g'
            ],
            [
        'name' => 'Fat',
        'per_100g' => '0g',
        'per_serving' => '0g'
            ],
            [
        'name' => 'Creatine Monohydrate',
        'per_100g' => '-',
        'per_serving' => '5g'
            ],
        ]),

                'faqs' => "Q: Do I need to load creatine?
A: No, daily use of 3–5g is effective without loading.

Q: When should I take it?
A: Anytime daily, ideally post-workout or with a meal.

Q: Is it safe?
A: Yes, creatine is one of the most researched supplements.",
            ],
            [
                'product_name' => 'Omega-3 Fish Oil Capsules',
                'product_description' => 'Heart health & anti-inflammation',
                'product_price' => 15.99,
                'product_image' => 'products/Omega_3_Fish_Oil_Capsules.png',
                'category_id' => 1,
                'flavours' => null,
                'information' => "Support your health from the inside out with our premium Omega-3 Fish Oil Capsules — a powerful daily essential for heart, brain, and joint health.

Rich in high-quality EPA and DHA, these essential fatty acids help maintain normal heart function, support cognitive performance, and reduce inflammation to keep your body moving at its best.

Sourced from purified fish oil and carefully refined to remove impurities, our capsules deliver maximum benefits without the fishy aftertaste.

Easy to swallow and highly absorbable, they fit seamlessly into your daily routine.

Clean. Pure. Effective.

Give your body the essential nutrients it needs to stay sharp, strong, and healthy every day.",

                'directions' => "Take 1–2 capsules daily with meals and water.",

                'ingredients' => "Fish Oil (providing EPA & DHA), Capsule Shell (Gelatin, Glycerin), Vitamin E (as antioxidant).

Allergens: Fish.",

                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '20 kcal'
            ],
            [
        'name' => 'Fat',
        'per_100g' => '-',
        'per_serving' => '2g'
            ],
            [
        'name' => 'Omega-3',
        'per_100g' => '-',
        'per_serving' => '1000mg'
            ],
            [
        'name' => 'EPA',
        'per_100g' => '-',
        'per_serving' => '600mg'
            ],
            [
        'name' => 'DHA',
        'per_100g' => '-',
        'per_serving' => '400mg'
            ],
        ]),

                'faqs' => "Q: What are the benefits?
A: Supports heart, brain, and joint health.

Q: When should I take it?
A: With meals for better absorption.

Q: Is there a fishy aftertaste?
A: No, our capsules are refined to minimise aftertaste.",
            ],
            [
                'product_name' => 'Pre-Workout Energy Blast',
                'product_description' => 'Enhances focus and performance',
                'product_price' => 19.99,
                'product_image' => 'products/Pre_Workout_Energy_Blast.png',
                'category_id' => 1,
                'flavours' => json_encode(['Blue Raspberry', 'Cola', 'Mango']),
                'information' => "Unleash unstoppable energy with our high-performance pre-workout — built to power your toughest sessions and elevate every rep.

Formulated with a potent blend of energy-boosting and focus-enhancing ingredients, it delivers explosive strength, increased endurance, and razor-sharp concentration from the very first scoop.

Feel the surge as you push past limits, lift heavier, and train longer with enhanced stamina and reduced fatigue.

Whether you are hitting intense workouts or chasing new personal bests, this is your ultimate performance partner.

Fast-acting. Hard-hitting. Results-driven.

Take it before your workout and dominate every session.",

                'directions' => "Mix 1 scoop with 200–250ml water.

Consume 20–30 minutes before exercise.",

                'ingredients' => "Caffeine Anhydrous, Beta-Alanine, L-Citrulline Malate, Creatine Monohydrate, L-Tyrosine, Natural & Artificial Flavouring, Sweeteners (Sucralose, Acesulfame K), Colouring, Anti-Caking Agents.",

                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '10–20 kcal'
            ],
            [
        'name' => 'Carbohydrates',
        'per_100g' => '-',
        'per_serving' => '2–4g'
            ],
            [
        'name' => 'Caffeine',
        'per_100g' => '-',
        'per_serving' => '150–200mg'
            ],
            [
            'name' => 'Beta-Alanine',
            'per_100g' => '-',
            'per_serving' => '2–3g'
            ],
            [
        'name' => 'Citrulline Malate',
        'per_100g' => '-',
        'per_serving' => '4–6g'
            ],
    ]),

                'faqs' => "Q: How long before training should I take it?
A: 20–30 minutes before your workout.

Q: Will it make me feel jittery?
A: It contains caffeine, so start with half a scoop if sensitive.

Q: Can I take it daily?
A: Yes, but avoid late evening use.",
            ],
            [
                'product_name' => 'Vitamin D3 5000IU',
                'product_description' => 'Immune and bone health support',
                'product_price' => 12.99,
                'product_image' => 'products/Vitamin_D3_5000IU.png',
                'category_id' => 1,
                'flavours' => null,
                'information' => "Support your health, strength, and vitality with our premium Vitamin D3 — the essential nutrient your body needs to perform at its best.

Known as the “sunshine vitamin,” Vitamin D3 plays a crucial role in maintaining strong bones, supporting immune function, and promoting overall wellbeing.

Our high-quality, easy-to-absorb formula helps your body effectively utilise calcium, contributing to healthy bones and teeth while supporting muscle function and daily energy levels.

Perfect for year-round use, especially when sunlight exposure is limited.

Simple. Essential. Powerful.

Give your body the daily support it needs with Vitamin D3 you can rely on.",

                'directions' => "Take 1 tablet/capsule daily with a meal.",

                'ingredients' => "Vitamin D3 (Cholecalciferol), Carrier Oil (e.g. Sunflower Oil) or Bulking Agents (Microcrystalline Cellulose), Capsule Shell.",

                'nutrition' => json_encode([
            [
        'name' => 'Vitamin D3 5000IU',
        'per_100g' => '-',
        'per_serving' => '1000–2000 IU (25–50µg)'
            ],
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '0 kcal'
            ],
        ]),

                'faqs' => "Q: Why is Vitamin D important?
A: It supports bones, immunity, and overall health.

Q: When should I take it?
A: With a meal, preferably containing fats.

Q: Can I take it year-round?
A: Yes, especially in low sunlight conditions.",
            ],
            [
                'product_name' => 'Organic Almond Butter',
                'product_description' => 'High-protein natural spread',
                'product_price' => 10.99,
                'product_image' => 'products/Organic_Almond_Butter.png',
                'category_id' => 2,
                'flavours' => null,
                'information' => 'Indulge in pure, natural nutrition with our Organic Almond Butter — crafted from 100% premium, organically grown almonds for a rich, smooth taste you’ll love. Packed with healthy fats, plant-based protein, and essential vitamins, it’s the perfect fuel for sustained energy and everyday wellness. Free from added sugars, preservatives, and artificial ingredients, our almond butter delivers clean, wholesome goodness in every spoonful. Whether spread on toast, blended into smoothies, or enjoyed straight from the jar, it’s a delicious and nutritious way to support your lifestyle. Pure. Nutritious. Delicious. Elevate your everyday fuel with organic almond butter made the way nature intended.',
                'directions' => null,
                'information' => "Indulge in pure, natural nutrition with our Organic Almond Butter — crafted from 100% premium, organically grown almonds for a rich, smooth taste you’ll love.

Packed with healthy fats, plant-based protein, and essential vitamins, it’s the perfect fuel for sustained energy and everyday wellness.

Free from added sugars, preservatives, and artificial ingredients, our almond butter delivers clean, wholesome goodness in every spoonful.

Whether spread on toast, blended into smoothies, or enjoyed straight from the jar, it’s a delicious and nutritious way to support your lifestyle.

Pure. Nutritious. Delicious.

Elevate your everyday fuel with organic almond butter made the way nature intended.",

                'directions' => null,

                'ingredients' => "100% Organic Almonds.

Allergens: Nuts (Almonds).",

                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '90 kcal'
            ],
            [
        'name' => 'Protein',
        'per_100g' => '-',
        'per_serving' => '3–4g'
            ],
            [
        'name' => 'Carbohydrates',
        'per_100g' => '-',
        'per_serving' => '2–3g'
            ],
            [
        'name' => 'Fat',
        'per_100g' => '-',
        'per_serving' => '8–9g'
            ],
            [
        'name' => 'Fibre',
        'per_100g' => '-',
        'per_serving' => '1–2g'
            ],
        ]),

                'faqs' => "Q: Does it contain added sugar?
A: No, it’s 100% natural almonds.

Q: Why is there oil separation?
A: It’s natural — just stir before use.

Q: Is it good for weight gain?
A: Yes, it’s calorie-dense and nutrient-rich.",
            ],
            [
                'product_name' => 'High-Protein Granola Mix',
                'product_description' => 'Breakfast fuel with added fibre',
                'product_price' => 8.99,
                'product_image' => 'products/High_Protein_Granola_Mix.png',
                'category_id' => 2,
                'flavours' => null,
                'information' => 'Start your day strong with our High-Protein Granola Mix — the perfect balance of taste, crunch, and performance nutrition. Packed with premium protein and wholesome ingredients, it fuels your body with sustained energy while supporting muscle recovery and growth. Carefully crafted with a blend of toasted oats, crunchy nuts, and natural sweeteners, every bite delivers a satisfying texture and rich flavour without unnecessary additives. Whether enjoyed with milk, yogurt, or straight from the bag, it’s a convenient and delicious way to stay on track with your fitness goals. Crunchy. Nourishing. Powerful. Upgrade your breakfast and snack game with a granola that works as hard as you do.',
                'directions' => 'Consume 1 serving (40–60g) with milk, yogurt, or as a snack.',
                'information' => "Start your day strong with our High-Protein Granola Mix — the perfect balance of taste, crunch, and performance nutrition.

Packed with premium protein and wholesome ingredients, it fuels your body with sustained energy while supporting muscle recovery and growth.

Carefully crafted with a blend of toasted oats, crunchy nuts, and natural sweeteners, every bite delivers a satisfying texture and rich flavour without unnecessary additives.

Whether enjoyed with milk, yogurt, or straight from the bag, it’s a convenient and delicious way to stay on track with your fitness goals.

Crunchy. Nourishing. Powerful.

Upgrade your breakfast and snack game with a granola that works as hard as you do.",

                'directions' => "Consume 1 serving (40–60g) with milk, yogurt, or as a snack.",

                'ingredients' => "Rolled Oats, Whey or Plant Protein, Nuts, Seeds, Honey or Natural Sweetener, Coconut Oil, Dried Fruits, Natural Flavouring.

Allergens: May contain Nuts, Gluten, Milk.",

                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '200–250 kcal'
            ],
            [
        'name' => 'Protein',
        'per_100g' => '-',
        'per_serving' => '10–15g'
            ],
            [
        'name' => 'Carbohydrates',
        'per_100g' => '-',
        'per_serving' => '20–30g'
            ],
            [
        'name' => 'Fat',
        'per_100g' => '-',
        'per_serving' => '7–10g'
            ],
            [
        'name' => 'Fibre',
        'per_100g' => '-',
        'per_serving' => '3–5g'
            ],
        ]),

                'faqs' => "Q: How should I eat it?
A: With milk, yogurt, or as a snack.

Q: Is it suitable for weight loss?
A: Yes, in controlled portions.

Q: Does it contain added sugar?
A: Only natural sweeteners are used.",
            ],

            [
                'product_name' => 'Meal Replacement Shake Pack',
                'product_description' => 'Balanced macronutrient formula',
                'product_price' => 29.99,
                'product_image' => 'products/Meal_Replacement_Shake_Pack.png',
                'category_id' => 2,
                'flavours' => json_encode(['Strawberry', 'Vanilla', 'Banana']),
                'flavours' => json_encode(['Strawberry', 'Vanilla', 'Banana']),
                'information' => "Take control of your nutrition with our all-in-one Meal Replacement Shake Pack — designed for busy lifestyles without compromising on quality.

Each serving delivers a perfectly balanced blend of high-quality protein, essential vitamins and minerals, and sustained-release carbohydrates to keep you full, energised, and focused throughout the day.

Whether you are managing your weight, fuelling your fitness goals, or simply need a quick, nutritious option on the go, this shake has you covered.

Smooth, satisfying, and easy to prepare, it’s a complete meal in seconds — no prep, no stress.

Balanced. Convenient. Effective.

Fuel your day the smarter way with a meal replacement that keeps up with your lifestyle.",
                'directions' => "Mix 1 serving with 250–300ml water or milk.

Consume as a replacement for one meal.",
                'ingredients' => "Protein Blend (Whey or Plant-Based), Oat Flour, Maltodextrin, Vitamin & Mineral Blend, Natural Flavouring, Sweeteners, Thickener (Xanthan Gum).",
                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '200–400 kcal'
            ],
            [
        'name' => 'Protein',
        'per_100g' => '-',
        'per_serving' => '20–30g'
            ],
            [
        'name' => 'Carbohydrates',
        'per_100g' => '-',
        'per_serving' => '25–40g'
            ],
            [
        'name' => 'Fat',
        'per_100g' => '-',
        'per_serving' => '5–10g'
            ],
            [
        'name' => 'Fibre',
        'per_100g' => '-',
        'per_serving' => '3–6g'
            ],
            [
        'name' => 'Vitamins & Minerals',
        'per_100g' => '-',
        'per_serving' => '~20–50% NRV'
            ],
        ]),

                'faqs' => "Q: Can I replace all meals with this?
A: No, use to replace 1–2 meals per day.

Q: Will it keep me full?
A: Yes, it’s designed for satiety and balanced nutrition.

Q: Is it good for weight loss?
A: Yes, when used as part of a calorie-controlled diet.",
            ],
            [
                'product_name' => 'Electrolyte Hydration Mix',
                'product_description' => 'Restores essential minerals',
                'product_price' => 14.99,
                'product_image' => 'products/Electrolyte_Hydration_Mix.png',
                'category_id' => 2,
                'flavours' => json_encode(['Lemon', 'Lime', 'Orange']),
                'information' => "Stay hydrated, energised, and performing at your best with our Electrolyte Hydration Mix — your essential partner for optimal hydration and recovery.

Formulated with a precise blend of key electrolytes, it helps replenish what your body loses through sweat, supporting muscle function, endurance, and overall performance.

Whether you are training hard, fasting, or just need a daily hydration boost, this fast-absorbing formula keeps you refreshed and recharged without unnecessary sugars or fillers.

Simply mix with water for a clean, crisp drink that hydrates efficiently and effectively.

Refresh. Replenish. Perform.

Power your body with hydration that works as hard as you do.",
                'directions' => "Mix 1 serving with 500–700ml water.

Consume during or after exercise or throughout the day.",
                'ingredients' => "Sodium, Potassium, Magnesium, Calcium, Natural Flavouring, Citric Acid, Sweeteners (optional), Colouring.",
                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '5–20 kcal'
            ],
            [
        'name' => 'Sodium',
        'per_100g' => '-',
        'per_serving' => '200–500mg'
            ],
            [
        'name' => 'Potassium',
        'per_100g' => '-',
        'per_serving' => '100–300mg'
            ],
            [
        'name' => 'Magnesium',
        'per_100g' => '-',
        'per_serving' => '50–100mg'
            ],
            [
        'name' => 'Calcium',
        'per_100g' => '-',
        'per_serving' => '50–150mg'
            ],
        ]),

                'faqs' => "Q: When should I use it?
A: During workouts, fasting, or throughout the day.

Q: Does it contain sugar?
A: Low or no sugar depending on flavour.

Q: Can I take it daily?
A: Yes, especially if you sweat a lot.",
            ],
            [
                'product_name' => 'Vegan Protein Bars (Box of 12)',
                'product_description' => 'Plant-based energy snack',
                'product_price' => 22.99,
                'product_image' => 'products/Vegan_Protein_Bars_Box_of_12.png',
                'category_id' => 2,
                'flavours' => json_encode(['Fudge brownie', 'Peanut butter', 'Chocolate chip']),
                'information' => "Fuel your day the plant-powered way with our Vegan Protein Bars — the perfect balance of clean nutrition and great taste.

Packed with high-quality plant-based protein, they support muscle recovery, sustained energy, and everyday performance without compromising your lifestyle.

Crafted from carefully selected natural ingredients, these bars are free from dairy and artificial additives, delivering a rich, satisfying texture with every bite.

Whether you need a quick post-workout refuel or a convenient on-the-go snack, they’ve got you covered.

Clean. Plant-based. Powerful.

Snack smarter with protein bars designed to keep you going strong.",
                'directions' => null,
                'ingredients' => "Plant Protein (Pea/Rice), Dates or Natural Sweetener, Nuts/Seeds, Cocoa (if flavoured), Natural Flavouring.

Allergens: May contain Nuts.",
                'nutrition' => json_encode([
            [
        'name' => 'Calories',
        'per_100g' => '-',
        'per_serving' => '180–250 kcal'
            ],
            [
        'name' => 'Protein',
        'per_100g' => '-',
        'per_serving' => '10–20g'
            ],
            [
        'name' => 'Carbohydrates',
        'per_100g' => '-',
        'per_serving' => '15–25g'
            ],
            [
        'name' => 'Fat',
        'per_100g' => '-',
        'per_serving' => '6–10g'
            ],
            [
        'name' => 'Fibre',
        'per_100g' => '-',
        'per_serving' => '3–6g'
            ]
        ]),

                'faqs' => "Q: Are they fully vegan?
A: Yes, 100% plant-based ingredients.

Q: When should I eat one?
A: As a snack or post-workout.

Q: Are they high in sugar?
A: No, they use natural sweeteners.",
            ],
            [
                'product_name' => 'Resistance Band Set (5 Levels)',
                'product_description' => 'Ideal for mobility & strength',
                'product_price' => 18.99,
                'product_image' => 'products/Resistance_Band_Set_5_Levels.png',
                'category_id' => 3,
                'flavours' => null,
                'information' => "Train anytime, anywhere with our versatile Resistance Band Set — the ultimate tool for building strength, improving flexibility, and enhancing overall fitness.

Designed for all fitness levels, these durable, high-quality bands provide adjustable resistance to support everything from beginner workouts to advanced training.

Perfect for home workouts, travel, or gym sessions, they allow you to target every muscle group with controlled, effective movements.

Portable. Powerful. Versatile.

Take your workouts to the next level with resistance bands that deliver real results — wherever you are.",
                'directions' => "Select desired resistance level.

Perform exercises targeting different muscle groups.

Use 3–5 times per week.",
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Are they suitable for beginners?
A: Yes, multiple resistance levels make them suitable for all.

Q: Can they replace weights?
A: They’re great for resistance training but can complement weights.",
            ],
            [
                'product_name' => 'Wrist Wraps (Pair)',
                'product_description' => 'Provides wrist support during lifts',
                'product_price' => 12.99,
                'product_image' => 'products/Wrist_Wraps_Pair.png',
                'category_id' => 3,
                'flavours' => null,
                'information' => "Lift with confidence and protect your performance with our premium Wrist Wraps — built for strength, stability, and support.

Designed to reinforce your wrists during heavy lifts, they help reduce strain, improve control, and allow you to push harder with every rep.

Made from durable, high-quality materials with adjustable compression, these wraps provide a secure, comfortable fit for any workout.

Strong. Secure. Reliable.

Take your lifting to the next level with wrist wraps that work as hard as you do.",
                'directions' => "Wrap securely around wrists before lifting.

Adjust tightness for support during heavy exercises.",
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: When should I use them?
A: During heavy lifting or wrist-intensive exercises.

Q: Do they restrict movement?
A: No, they provide support while allowing flexibility.",
            ],
            [
                'product_name' => 'Foam Roller 45cm',
                'product_description' => 'Helps with recovery & mobility',
                'product_price' => 16.99,
                'product_image' => 'products/Foam_Roller_45cm.png',
                'category_id' => 3,
                'flavours' => null,
                'information' => "Recover smarter and move better with our high-performance Foam Roller — your go-to tool for muscle recovery, mobility, and pain relief.

Designed to target sore muscles and tight areas, it helps release tension, improve blood flow, and speed up recovery after intense workouts.

Built with durable, high-density foam, it delivers the perfect balance of firmness and comfort for effective deep tissue massage.

Whether you are warming up, cooling down, or easing everyday stiffness, this roller supports flexibility and keeps your body feeling at its best.

Recover. Restore. Perform.

Elevate your recovery routine with a foam roller that keeps you moving strong.",
                'directions' => "Roll slowly over muscle groups for 30–60 seconds per area before or after workouts.",
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: When should I use it?
A: Before or after workouts for recovery.

Q: Does it hurt?
A: Mild discomfort is normal, especially on tight muscles.",
            ],
            [
                'product_name' => 'Skipping Rope (Adjustable)',
                'product_description' => 'Cardio endurance training',
                'product_price' => 9.99,
                'product_image' => 'products/Skipping_Rope_Adjustable.png',
                'category_id' => 3,
                'flavours' => null,
                'information' => "Boost your fitness with our high-performance Skipping Rope — a simple yet powerful tool for improving cardio, endurance, and agility.

Designed for speed and control, it delivers smooth, fast rotations to help you maximise every workout, whether you are training at home, in the gym, or on the go.

Lightweight, durable, and fully adjustable, it’s perfect for all fitness levels — from beginners to advanced athletes.

Burn calories, enhance coordination, and build stamina with a workout that’s both effective and fun.

Fast. Efficient. Powerful.

Take your cardio to the next level with a skipping rope built for results.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Is it good for weight loss?
A: Yes, it’s highly effective for burning calories.

Q: Can beginners use it?
A: Absolutely — start slow and build up.",
            ],
            [
                'product_name' => 'Gym Grip Gloves',
                'product_description' => 'Comfort & grip for weight training',
                'product_price' => 14.99,
                'product_image' => 'products/Gym_Grip_Gloves.png',
                'category_id' => 3,
                'flavours' => null,
                'information' => "Train harder with our premium Gym Grip Gloves — designed to enhance your grip, protect your hands, and improve lifting performance.

Featuring anti-slip padding and breathable material, they reduce calluses while giving you maximum control during every rep.

Comfortable, durable, and built for serious training.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Do they prevent calluses?
A: Yes, they protect your hands during lifting.

Q: Will they improve grip?
A: Yes, especially during heavy or sweaty workouts.",
            ],
            [
                'product_name' => 'Adjustable Dumbbell Set (20kg)',
                'product_description' => 'Multi-purpose strength equipment',
                'product_price' => 89.99,
                'product_image' => 'products/Adjustable_Dumbbell_Set_20kg.png',
                'category_id' => 4,
                'flavours' => null,
                'information' => "Build strength your way with our Adjustable Dumbbell Set (20kg) — a versatile, space-saving solution for full-body training.

Easily customise the weight to match your level and progress over time.

Perfect for home workouts, it allows you to target every muscle group with precision and control.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Is it suitable for home workouts?
A: Yes, it’s ideal for saving space.

Q: Can I increase weight over time?
A: Yes, it’s fully adjustable.",
            ],
            [
                'product_name' => 'Kettlebell 12kg',
                'product_description' => 'Perfect for HIIT & strength',
                'product_price' => 34.99,
                'product_image' => 'products/Kettlebell_12kg.png',
                'category_id' => 4,
                'flavours' => null,
                'information' => "Take your functional training to the next level with our 12kg Kettlebell — ideal for building strength, endurance, and explosive power.

Designed with a comfortable grip and balanced weight distribution, it’s perfect for swings, squats, presses, and full-body workouts.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: What exercises can I do?
A: Swings, squats, presses, and more.

Q: Is 12kg suitable for beginners?
A: It depends on strength level — moderate difficulty.",
            ],
            [
                'product_name' => 'Pull-Up Bar (Doorway Mounted)',
                'product_description' => 'Upper-body training',
                'product_price' => 29.99,
                'product_image' => 'products/Pull_Up_Bar_Doorway_Mounted.png',
                'category_id' => 4,
                'flavours' => null,
                'information' => "Turn any doorway into a powerful workout station with our Doorway Pull-Up Bar.

Built for strength and stability, it allows you to perform pull-ups, chin-ups, and core exercises at home with ease.

No permanent installation needed — just simple, effective upper body training.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Does it require drilling?
A: No, it’s doorway-mounted.

Q: Is it stable?
A: Yes, when installed correctly.",
            ],
            [
                'product_name' => 'Yoga Mat (10mm Thick)',
                'product_description' => 'High comfort and cushioning',
                'product_price' => 19.99,
                'product_image' => 'products/Yoga_Mat_10mm_Thick.png',
                'category_id' => 4,
                'flavours' => null,
                'information' => "Experience comfort and stability with our 10mm Thick Yoga Mat — designed to support your workouts from stretching to intense training.

The extra cushioning protects your joints while the non-slip surface keeps you balanced and secure.

Perfect for yoga, Pilates, and home workouts.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Is it non-slip?
A: Yes, designed for stability.

Q: Is it suitable for workouts?
A: Yes, not just yoga — great for all exercises.",
            ],
            [
                'product_name' => 'Adjustable Bench Press',
                'product_description' => 'Full-body workout bench',
                'product_price' => 119.99,
                'product_image' => 'products/Adjustable_Bench_Press.png',
                'category_id' => 4,
                'flavours' => null,
                'information' => "Upgrade your home gym with our Adjustable Bench Press — built for versatility and performance.

With multiple incline positions, it supports a wide range of exercises including chest press, shoulder workouts, and core training.

Strong, stable, and essential for serious progress.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Can I adjust angles?
A: Yes, multiple incline positions.

Q: Is it sturdy?
A: Built for stability and heavy use.",
            ],
            [
                'product_name' => 'Sports Water Bottle 1L',
                'product_description' => 'Durable BPA-free bottle',
                'product_price' => 6.99,
                'product_image' => 'products/Sports_Water_Bottle.png',
                'category_id' => 5,
                'flavours' => null,
                'information' => "Stay hydrated and perform at your best with our 1L Sports Water Bottle.

Designed for convenience and durability, it keeps your drinks secure and easily accessible throughout your workout or day.

Lightweight, leak-proof, and perfect for on-the-go hydration.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Is it leak-proof?
A: Yes, designed for secure use.

Q: Can I use hot drinks?
A: Depends on material (best for cold drinks).",
            ],
            [
                'product_name' => 'Gym Towel (Microfibre)',
                'product_description' => 'Sweat-absorbent quick-dry design',
                'product_price' => 7.99,
                'product_image' => 'products/Gym_Towel.png',
                'category_id' => 5,
                'flavours' => null,
                'information' => "Stay fresh and focused with our Microfibre Gym Towel — lightweight, ultra-absorbent, and quick-drying.

Perfect for intense workouts, it helps keep sweat under control while being compact enough to carry anywhere.

Clean, convenient, and essential for every session.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Is it quick-drying?
A: Yes, microfibre material dries fast.

Q: Is it compact?
A: Yes, easy to carry.",
            ],
            [
                'product_name' => 'Health Journal Notebook',
                'product_description' => 'Track workouts & wellness goals',
                'product_price' => 11.99,
                'product_image' => 'products/Health_Journal_Notebook.png',
                'category_id' => 5,
                'flavours' => null,
                'information' => "Stay on track and achieve your goals with our Health Journal Notebook — your personal space to plan workouts, track progress, and build better habits.

Designed to keep you focused and motivated, it helps turn your fitness journey into a structured, achievable plan.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => null,
            ],
            [
                'product_name' => 'Aromatherapy Essential Oils Set',
                'product_description' => 'Stress-relief wellness pack',
                'product_price' => 14.99,
                'product_image' => 'products/Aromatherapy_Essential_Oils_Set.png',
                'category_id' => 5,
                'flavours' => null,
                'information' => "Relax, recover, and recharge with our Aromatherapy Essential Oils Set.

Crafted from high-quality natural extracts, each oil is designed to support relaxation, focus, and overall wellbeing.

Perfect for post-workout recovery, stress relief, or creating a calm environment.",
                'directions' => "Add a few drops to a diffuser or dilute before topical use.",
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: How do I use them?
A: In a diffuser or diluted for topical use.

Q: Are they natural?
A: Yes, made from natural extracts.",
            ],
            [
                'product_name' => 'Reusable Meal Prep Containers (Set of 10)',
                'product_description' => 'Food storage for meal planning',
                'product_price' => 17.99,
                'product_image' => 'products/Reusable_Meal_Prep_Containers.png',
                'category_id' => 5,
                'flavours' => null,
                'information' => "Stay consistent with your nutrition using our Reusable Meal Prep Containers (Set of 10).

Durable, leak-proof, and easy to store, they make it simple to plan your meals and stay on track with your goals.

Perfect for busy lifestyles and disciplined routines.",
                'directions' => null,
                'ingredients' => null,
                'nutrition' => null,
                'faqs' => "Q: Are they microwave safe?
A: Yes (check lid instructions).

Q: Are they reusable?
A: Yes, durable and long-lasting.",
            ],
        ]);
    }
}
