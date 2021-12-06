# iTop 中国用户优化

针对中国用户的需求，优化配置和翻译，包括

1. `app_icon_url` 设置为 `app_root_url` 值，避免链接到 combodo 主页
2. 设置 PDF 导出功能的默认字体，解决中文乱码问题
3. 设置默认时区为东八区
4. 设置 CSV 导出的默认编码为 `UTF-8`
5. 修复中文姓名顺序问题
6. 修复 Typology 翻译问题（应为 类型，非 拓扑，拓扑是 Topology）

## 安装步骤

1. 复制插件到 `extensions` 目录
2. `chmod +w conf/production/config-itop.php` 使配置文件可写
3. 浏览器访问 `/setup` ，安装插件时勾选 `iTop 中国用户优化` 即可