import discord
import openai
import logging
import asyncio
import psutil
import os
import tracemalloc

# Bật tracemalloc để theo dõi phân bổ bộ nhớ
tracemalloc.start()

# Cập nhật base_url để trỏ đến https://api.hakai.shop:8080
openai.api_key = "sk-kaCSlJhHziGwKdVN3bA0306eCd27448dBa583a40FdFcE901"
openai.api_base = "https://api.hakai.shop:8080/v1"

intents = discord.Intents.default()
intents.message_content = True
client = discord.Client(intents=intents)

# Cấu hình logging
logging.basicConfig(level=logging.INFO, format='%(asctime)s - %(levelname)s - %(message)s')
logger = logging.getLogger()

# Cấu hình cảnh báo
alert_channel_id = 1223322123123  # Thay thế bằng ID của kênh cảnh báo

async def send_alert(message):
    channel = client.get_channel(alert_channel_id)
    if channel:
        await channel.send(message)

# Giám sát tài nguyên hệ thống
async def monitor_system():
    while True:
        cpu_usage = psutil.cpu_percent()
        memory_info = psutil.virtual_memory()
        memory_usage = memory_info.percent
        
        logger.info(f'CPU Usage: {cpu_usage}%')
        logger.info(f'Memory Usage: {memory_usage}%')

        if cpu_usage > 80:
            await send_alert(f'⚠️ Cảnh báo: Sử dụng CPU cao: {cpu_usage}%')
        
        if memory_usage > 80:
            await send_alert(f'⚠️ Cảnh báo: Sử dụng bộ nhớ cao: {memory_usage}%')

        await asyncio.sleep(60)  # Kiểm tra mỗi phút

# Tự động khởi động lại khi gặp sự cố nghiêm trọng
def restart_bot():
    os.execv(sys.executable, ['python'] + sys.argv)

async def ensure_reconnect():
    while True:
        try:
            await client.start(MTIyNzk3NTY0NDA4NDk2NTQyNg.Gu0Ugc.qUuePV_pFQpN-ExclppUAhjhb3Iur86zhifL8Q)
        except Exception as e:
            logger.error(f"Đã xảy ra lỗi: {e}")
            await send_alert(f"❌ Đã xảy ra lỗi nghiêm trọng: {e}")
            await asyncio.sleep(10)  # Đợi 10 giây trước khi kết nối lại

@client.event
async def on_ready():
    logger.info(f'Bot đã đăng nhập thành công với tên người dùng: {client.user}')
    logger.info('Bot đang hoạt động và sẵn sàng nhận tin nhắn.')
    await send_alert('✅ Bot đã sẵn sàng và hoạt động!')

@client.event
async def on_message(message):
    if message.author == client.user:
        return

    logger.info(f'Nhận tin nhắn từ {message.author}: {message.content}')

    try:
        # Gửi yêu cầu đến API OpenAI
        response = openai.ChatCompletion.create(
            model="gpt-3.5-turbo",
            messages=[
                {"role": "system", "content": "Bạn là một trợ lý hữu ích."},
                {"role": "user", "content": message.content}
            ]
        )
        response_content = response.choices[0].message['content']
        await message.channel.send(response_content)
        logger.info("Đã gửi yêu cầu đến API và nhận phản hồi thành công.")

    except openai.error.OpenAIError as api_error:
        await message.channel.send(f"Lỗi API: {api_error}")
        logger.error(f"Đã xảy ra lỗi API: {api_error}")
        await send_alert(f"❌ Lỗi API: {api_error}")

    except Exception as e:
        await message.channel.send(f"Lỗi: {e}")
        logger.error(f"Đã xảy ra lỗi: {e}")
        await send_alert(f"❌ Đã xảy ra lỗi: {e}")
        restart_bot()  # Khởi động lại bot nếu gặp lỗi nghiêm trọng

@client.event
async def on_disconnect():
    logger.warning("Bot đã bị ngắt kết nối khỏi Discord.")
    await send_alert("⚠️ Bot đã bị ngắt kết nối khỏi Discord.")

@client.event
async def on_reconnect():
    logger.info("Bot đã kết nối lại với Discord.")
    await send_alert("✅ Bot đã kết nối lại với Discord.")

if __name__ == "__main__":
    logger.info("Đang khởi động bot...")
    asyncio.get_event_loop().create_task(monitor_system())
    asyncio.run(ensure_reconnect())
d
