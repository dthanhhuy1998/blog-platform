<?php

return [
    'layout' => [
        'float_icons' => array(
            [
                'name' => 'Call',
                'title' => 'Gọi điện',
                'icon' => '<i class="fa-solid fa-phone text-white text-lg z-10"></i>',
                'value' => 'tel:0918798819',
                'target' => '_self',
            ], [
                'name' => 'Zalo',
                'title' => 'Zalo OA',
                'icon' => '
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/9/91/Icon_of_Zalo.svg"
                        alt="Zalo"
                        class="w-6 h-6 z-10"
                    />
                ',
                'value' => 'https://zalo.me/4405521331102056766',
                'target' => '_blank',
            ], [
                'name' => 'Facebook',
                'title' => 'Fanpage',
                'icon' => '<i class="fa-brands fa-facebook-f text-white text-lg z-10"></i>',
                'value' => '',
                'target' => '_blank',
            ]
        ),
    ],
    'homepage' => [
        'about_us' => [
            'label' => 'Về chúng tôi',
            'title' => 'Trung tâm Sản xuất sản phẩm Nông nghiệp và Thực phẩm',
            'description' => '
                <p class="md:mt-5 text-[#57534D] text-justify text-sm sm:text-base leading-relaxed md:w-[60%] w-[100%] text-[10px] md:w-full">
                    Trung tâm Sản xuất sản phẩm Nông nghiệp và Thực phẩm là đơn vị trực
                    thuộc Trường Đại học Kiên Giang, được thành lập với sứ mệnh tổ chức
                    sản xuất, nghiên cứu ứng dụng và chuyển giao công nghệ trong lĩnh vực
                    nông nghiệp - thực phẩm.
                </p>
                <p class="mt-5 text-sm text-[#57534D] text-justify sm:text-base leading-relaxed md:w-[60%] w-[100%] text-[10px] md:w-full">
                    Chúng tôi hoạt động theo định hướng khoa học gắn liền thực tiễn, kết
                    nối chặt chẽ giữa "Sản xuất – Nghiên cứu – Đào tạo – Chuyển giao",
                    nhằm khai thác hiệu quả tiềm lực của Nhà trường để phục vụ phát triển
                    kinh tế – xã hội.
                </p>
            ',
            'image' => 'https://i.pinimg.com/1200x/06/3a/45/063a455e8a564cd072bd1326d7986ba6.jpg'
        ],
    ],
];